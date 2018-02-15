<?php

namespace App\CMS\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as BaseResponse;

class MockUpController extends BaseController
{
    /**
     * Return a mock-up page
     *
     * @param Request $request
     */
    static function index(Request $request) {
        $template_name = env('CMS_APPLICATION_NAME', '');
        $template_path = empty($template_name) ? '' : 'mockup.' . $template_name . '.';
        $requestPath = $request->path();

        $pageview_mapping = [
            "/" => "homepage",
            "gallery" => "gallery",
            "recreation" => "recreation",
            "recreation-detail" => "recreation-detail",
            "events-meetings" => "events-meetings",
            "events-meetings-detail" => "events-meetings-detail",
            "press-detail" => "press-detail",
            "accommodation" => "accommodation",
            "accommodation-detail" => "accommodation-detail",
            "restaurant-bars" => "restaurant-bars",
            "restaurant-bars-detail" => "restaurant-bars-detail",
            "family-adventure" => "family-adventure",
            "family-adventure-detail" => "family-adventure-detail",
            "destination" => "destination",
            "destination-detail" => "destination-detail",
            "offers" => "offers",
            "offers-detail" => "offers-detail",
            "about" => "about",
            "contact" => "contact",
            "latest-news" => "latest-news",
        ];
        $result_view = 'error.404';
        if (array_key_exists($requestPath, $pageview_mapping) && view()->exists($template_path . $pageview_mapping[$requestPath])) {
            $result_view = $template_path . $pageview_mapping[$requestPath];
        }
        return view($result_view);

    }

    /**
     * Return a view path for mock-up page
     *
     * @param string $view
     * @return string
     */
    private function getViewPath($view = '')
    {
        return config('cms.mockup.views_path', 'mockup') . '.' . config('cms.mockup.template_name')  . '.' . $view;
    }

    /**
     * Return a mock-up view
     *
     * @param string $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function mockup($view = '', $data = [])
    {
        if ( ! view()->exists($this->getViewPath($view))) {
            return abort(BaseResponse::HTTP_NOT_FOUND);
        }

        return view($this->getViewPath($view), $data);
    }

    /**
     * MOCK-UP SECTION
     */

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHomepage(/** @noinspection PhpUnusedParameterInspection */ Request  $request)
    {
        // Mock-up Data
        $data = [];

        return $this->mockup('homepage', $data);
    }
}
