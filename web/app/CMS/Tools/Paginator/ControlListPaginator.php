<?php
namespace App\CMS\Tools\Paginator;

use ArrayAccess;
use Countable;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Pagination\AbstractPaginator;
use IteratorAggregate;
use JsonSerializable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use App\CMS\Constants\CMSConstants;
use App\CMS\Helpers\CMSHelper;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class ControlListPaginator extends AbstractPaginator implements Arrayable, ArrayAccess, Countable, IteratorAggregate, JsonSerializable, Jsonable
{
    /**
     * @var null|int
     */
    protected $currentPage;

    /**
     * @var null|int
     */
    protected $perPage;

    /**
     * @var null|int
     */
    protected $total;

    /**
     * @var null|int
     */
    protected $totalPages;

    /**
     * @var null|int
     */
    protected $firstItemIndex;

    /**
     * @var null|int
     */
    protected $lastItemIndex;

    /**
     * @var bool
     */
    protected $hasMore = false;

    /**
     * @var null|string
     */
    protected $method;

    /**
     * @var null|string
     */
    protected $path;

    /**
     * @var null|string
     */
    protected $nextPageUrl;

    /**
     * @var null|string
     */
    protected $prevPageUrl;

    /**
     * @var Collection
     */
    protected $items;

    /**
     * @var string
     */
    protected $templateName = '';

    /**
     * @var string
     */
    protected $domainName = '';

    /**
     * @param $paginator
     */
    function __construct($paginator)
    {
        $this->currentPage = isset_not_empty($paginator->current_page);
        $this->perPage = isset_not_empty($paginator->per_page);
        $this->total = isset_not_empty($paginator->total);
        $this->totalPages = isset_not_empty($paginator->total_pages);
        $this->firstItemIndex = isset_not_empty($paginator->from);
        $this->lastItemIndex = isset_not_empty($paginator->to);
        $this->hasMore = isset($paginator->has_more) ? $paginator->has_more : false;
        $this->method = isset_not_empty($paginator->method, 'GET');
        $this->path = isset_not_empty($paginator->path);
        $this->nextPageUrl = isset_not_empty($paginator->next_page_url);
        $this->prevPageUrl = isset_not_empty($paginator->prev_page_url);
        $this->templateName = isset_not_empty($paginator->template_name);
        $this->domainName = isset_not_empty($paginator->domain_name);
        $this->pageName = isset_not_empty($paginator->page_name);

        $this->setItems(isset_not_empty($paginator->data, []));
    }

    /**
     * @param $data
     */
    private function setItems($data)
    {
        $this->items = $data instanceof Collection ? $data : Collection::make($data);
    }

    /**
     * @return int|null
     */
    public function currentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return int|null
     */
    public function perPage()
    {
        return $this->perPage;
    }

    /**
     * @return int|null
     */
    public function total()
    {
        return $this->total;
    }

    /**
     * @return int|null
     */
    public function totalPages()
    {
        return $this->totalPages;
    }

    /**
     * @return int|null
     */
    public function firstItemIndex()
    {
        return $this->firstItemIndex;
    }

    /**
     * @return int|null
     */
    public function lastItemIndex()
    {
        return $this->lastItemIndex;
    }

    /**
     * @return bool
     */
    public function hasMore()
    {
        return $this->hasMore;
    }

    /**
     * @return null|string
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * @return null|string
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * @return null|string
     */
    public function nextPageUrl()
    {
        return $this->nextPageUrl;
    }

    /**
     * @return null|string
     */
    public function previousPageUrl()
    {
        return $this->prevPageUrl;
    }

    /**
     * @return null|string
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function firstItem()
    {
        return collect($this->items)->first();
    }

    /**
     * @return mixed
     */
    public function lastItem()
    {
        return collect($this->items)->last();
    }

    /**
     * @param bool $fullPath
     * @param string $separator
     * @return null|string
     */
    public function templateName($fullPath = true, $separator = '.')
    {
        if ( ! $fullPath) {
            return $this->templateName;
        }

        if (CMSHelper::getSite()) {
            return CMSHelper::getTemplatePath(CMSConstants::PAGINATION_VIEW_PATH . $separator . $this->templateName, $separator);
        } else {
            return CMSConstants::TEMPLATE_VIEW_PATH . $separator . $this->domainName . $separator . CMSConstants::PAGINATION_VIEW_PATH . $separator . $this->templateName;
        }
    }


    /**
     * @param array $data
     * @return HtmlString
     */
    public function render($data = [])
    {
        $templateName = $this->templateName(true);

        if (view()->exists($templateName)) {
            return new HtmlString(
                view()->make($templateName, array_merge($data, [
                    'paginator' => $this
                ]))->render()
            );
        } else {
            return new HtmlString('NO TEMPLATE FOUND');
        }
    }

    /**
     * @return ControlListPaginator|null
     */
    public function nextPaginator()
    {
        if ( ! $this->nextPageUrl()) return null;

        $client = new Client();
        $response = $client->request($this->method(), $this->nextPageUrl(), [
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest'
            ]
        ]);

        if ($response->getStatusCode() === Response::HTTP_OK) {
            $body = $response->getBody();
            $json = (string) $body;
            return CMSHelper::createControlListPaginatorFromJSON($json);
        } else {
            return null;
        }
    }

    /**
     * @return HtmlString|null|string
     */
    public function renderNextPaginator()
    {
        if ( ! $this->nextPageUrl()) return null;

        $client = new Client();
        $response = $client->request($this->method(), $this->nextPageUrl());

        if ($response->getStatusCode() === Response::HTTP_OK) {
            $body = $response->getBody();
            $html = (string) $body;
            return new HtmlString($html);
        } else {
            return '';
        }
    }

    public function previousPaginator()
    {
        if ( ! $this->previousPageUrl()) return null;

        $client = new Client();
        $response = $client->request($this->method(), $this->previousPageUrl(), [
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest'
            ]
        ]);

        if ($response->getStatusCode() === Response::HTTP_OK) {
            $body = $response->getBody();
            $json = (string) $body;
            return CMSHelper::createControlListPaginatorFromJSON($json);
        } else {
            return null;
        }
    }

    public function renderPreviousPaginator()
    {
        if ( ! $this->previousPageUrl()) return null;

        $client = new Client();
        $response = $client->request($this->method(), $this->previousPageUrl());

        if ($response->getStatusCode() === Response::HTTP_OK) {
            $body = $response->getBody();
            $html = (string) $body;
            return new HtmlString($html);
        } else {
            return '';
        }
    }

    /**
     * @param $page
     * @return ControlListPaginator|null
     */
    public function paginatorOfPage($page)
    {
        $page = $this->isValidPageNumber($page) ? (int) $page : 1;

        $client = new Client();

        $path = preg_match('/\?/', $this->path())
            ? $this->path() . '&' . $this->pageName . '=' . $page
            : $this->path() . '?' . $this->pageName . '=' . $page;

        $response = $client->request($this->method(), $path, [
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest'
            ]
        ]);

        if ($response->getStatusCode() === Response::HTTP_OK) {
            $body = $response->getBody();
            $json = (string) $body;
            return CMSHelper::createControlListPaginatorFromJSON($json);
        } else {
            return null;
        }
    }

    /**
     * @param $page
     * @return HtmlString|string
     */
    public function renderPaginatorOfPage($page)
    {
        $page = $this->isValidPageNumber($page) ? (int) $page : 1;

        $client = new Client();

        $path = preg_match('/\?/', $this->path())
            ? $this->path() . '&' . $this->pageName . '=' . $page
            : $this->path() . '?' . $this->pageName . '=' . $page;

        $response = $client->request($this->method(), $path);

        if ($response->getStatusCode() === Response::HTTP_OK) {
            $body = $response->getBody();
            $html = (string) $body;
            return new HtmlString($html);
        } else {
            return '';
        }
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'current_page' => $this->currentPage(),
            'per_page' => $this->perPage(),
            'total' => $this->total(),
            'total_pages' => $this->totalPages(),
            'from' => $this->firstItemIndex(),
            'to' => $this->lastItemIndex(),
            'has_more' => $this->hasMore(),
            'template_name' => $this->templateName,
            'domain_name' => $this->domainName,
            'method' => 'GET',
            'path' => $this->path,
            'page_name' => $this->pageName,
            'next_page_url' => $this->nextPageUrl(),
            'prev_page_url' => $this->previousPageUrl(),
            'first_item' => $this->firstItem(),
            'last_item' => $this->lastItem(),
            'data' => $this->items->toArray(),
        ];
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}