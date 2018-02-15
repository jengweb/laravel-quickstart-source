<?php

namespace App\CMS\Helpers;


use App\CMS\Constants\CMSConstants;
use App\CMS\Tools\Paginator\ControlListPaginator;
use Bkwld\Croppa\Facade as Croppa;
use Carbon\Carbon;
use Clicknow\Money\Currency;
use Clicknow\Money\Money;
use Fadion\Fixerio\Exchange;
use Symfony\Component\HttpFoundation\Request;

class CMSHelper
{
    /**
     * CMSHelper constructor.
     */
    function __construct()
    {
        //
    }

    /**
     * COMMON
     */

    /**
     * Return true if the application is in mockup mode
     *
     * @return bool
     */
    public static function isMockupMode()
    {
        return config('cms.mockup.mode') || strtolower(config('cms.mockup.mode')) === 'true';
    }

    /**
     * Return view path according to site's domain name
     *
     * @param $templateName
     * @param string $separator
     * @return string
     */
    public static function getTemplatePath($templateName, $separator = '.')
    {
        if (self::isMockupMode()) {
            return config('cms.mockup.views_path', 'mockup') . $separator . config('cms.mockup.template_name') . $separator . $templateName;
        }

        if ($site = session(CMSConstants::SITE)) {
            return CMSConstants::TEMPLATE_VIEW_PATH . $separator . $site->domain_name . $separator . $templateName;
        }

        return $templateName;
    }

    /**
     * Return asset path according to site's domain name
     *
     * @param null $path
     * @param null $domainName
     * @return null|string
     */
    public static function getAssetPath($path = null, $domainName = null)
    {
        if (self::isMockupMode()) {
            return asset(CMSConstants::TEMPLATE_VIEW_PATH . '/' . config('cms.mockup.template_name') . '/' . remove_leading_slashes($path));
        }

        if (is_null($domainName)) {
            if ($site = session(CMSConstants::SITE)) {
                if (is_null($path)) {
                    return asset(CMSConstants::TEMPLATE_VIEW_PATH . '/' . $site->domain_name . '/');
                } else {
                    return asset(CMSConstants::TEMPLATE_VIEW_PATH . '/' . $site->domain_name . '/' . remove_leading_slashes($path));
                }
            }
        } else {
            if (is_null($path)) {
                return asset(CMSConstants::TEMPLATE_VIEW_PATH . '/' . $domainName . '/');
            } else {
                return asset(CMSConstants::TEMPLATE_VIEW_PATH . '/' . $domainName . '/' . remove_leading_slashes($path));
            }
        }

        return null;
    }

    /**
     * Return site from session
     *
     * @return mixed
     */
    public static function getSite()
    {
        return session(CMSConstants::SITE);
    }

    /**
     * Return site's main language from session
     *
     * @return mixed
     */
    public static function getSiteMainLanguage()
    {
        return session(CMSConstants::SITE_MAIN_LANGUAGE);
    }

    /**
     * Return site's languages from session
     *
     * @return mixed
     */
    public static function getSiteLanguages()
    {
        return session(CMSConstants::SITE_LANGUAGES);
    }

    /**
     * Return a current locale
     *
     * @return mixed
     */
    public static function getCurrentLocale()
    {
        return session(CMSConstants::CURRENT_LOCALE);
    }

    /**
     * Return a current hreflang
     *
     * @return mixed
     */
    public static function getCurrentHrefLang()
    {
        return session(CMSConstants::CURRENT_HREFLANG);
    }

    /**
     * Return current language code from session
     *
     * @return mixed
     */
    public static function getCurrentLanguageCode()
    {
        return session(CMSConstants::CURRENT_LANGUAGE_CODE);
    }

    /**
     * Return current base currency from GEO IP
     *
     * @return mixed
     */
    public static function getCurrentBaseCurrency()
    {
        return session(CMSConstants::CURRENT_BASE_CURRENCY, config('cms.default_currency', null));
    }

    /**
     * Return current language from session
     *
     * @return null|static
     */
    public static function getCurrentLanguage()
    {
        if ($code = static::getCurrentLanguageCode()) {
            if ($languages = self::getSiteLanguages()) {
                return collect($languages)->where(CMSConstants::CODE, $code)->first();
            }
        }

        return null;
    }

    /**
     * Return current page from session
     *
     * @return mixed
     */
    public static function getCurrentPage()
    {
        return session(CMSConstants::PAGE);
    }

    /**
     * Return current template name
     *
     * @return mixed
     */
    public static function getCurrentTemplate()
    {
        return session(CMSConstants::TEMPLATE);
    }

    /**
     * Return current global items
     *
     * @return mixed
     */
    public static function getCurrentGlobalItems()
    {
        return session(CMSConstants::GLOBAL_ITEMS);
    }

    /**
     * Return current page data from session
     *
     * @param null $page
     * @param null $default
     * @return mixed
     */
    public static function getCurrentPageData($page = null, $default = null)
    {
        if (is_null($page)) {
            if ($page = self::getCurrentPage()) {
                return collect($page)->get(CMSConstants::PAGE_DATA, $default);
            }
        }

        return collect($page)->get(CMSConstants::PAGE_DATA, $default);
    }

    /**
     * Return page's categories
     *
     * @param $page
     * @param null $default
     * @return mixed|null
     */
    public static function getCurrentPageCategories($page = null, $default = null)
    {
        if (is_null($page)) $page = self::getCurrentPageData();
        return collect($page)->get(CMSConstants::CATEGORIES_KEY, $default);
    }

    /**
     * Return page data
     *
     * @param $friendlyUrl
     * @param null $languageCode
     * @param array $filterItems
     * @return array|mixed|null
     */
    public static function getPageDataByFriendlyUrl($friendlyUrl, $languageCode = null, $filterItems = [])
    {
        return APIHelper::getPageData($friendlyUrl, $languageCode, $filterItems);
    }

    /**
     * Return current template data from session
     *
     * @param null $page
     * @param null $default
     * @return mixed
     */
    public static function getCurrentTemplateData($page = null, $default = null)
    {
        if (is_null($page)) {
            if ($page = self::getCurrentPage()) {
                return collect($page)->get(CMSConstants::TEMPLATE_DATA, $default);
            }
        }

        return collect($page)->get(CMSConstants::TEMPLATE_DATA, $default);
    }

    /**
     * Return current parent pages from session
     *
     * @param null $page
     * @param null $default
     * @param bool $withData
     * @param null $languageCode
     * @param array $filterPages
     * @param array $filterItems
     * @return mixed|null
     */
    public static function getCurrentParentPages($page = null, $default = null, $withData = false, $languageCode = null, $filterPages = [], $filterItems = [])
    {
        if (is_null($page)) {
            if ($page = self::getCurrentPage()) {
                if ($withData) {
                    return APIHelper::getParentPagesData($page->friendly_url, $languageCode, $filterPages, $filterItems);
                }
            }
        }

        $parentPages = collect($page)->get(CMSConstants::PARENTS, $default);

        if (empty($filterPages)) {
            return $parentPages;
        }

        $filteredPages = collect($parentPages)
            ->filter(function ($item) use ($filterPages) {
                return in_array($item->friendly_url, $filterPages);
            })
            ->all();

        return $filteredPages;
    }

    /**
     * Return parent pages data
     *
     * @param $friendlyUrl
     * @param null $languageCode
     * @param array $filterPages
     * @param array $filterItems
     * @return array|mixed|null|string
     */
    public static function getParentPagesDataByFriendlyUrl($friendlyUrl, $languageCode = null, $filterPages = [], $filterItems = [])
    {
        return APIHelper::getParentPagesData($friendlyUrl, $languageCode, $filterPages, $filterItems);
    }

    /**
     * Return current children pages from session
     *
     * @param null $page
     * @param null $default
     * @param bool $withData
     * @param null $languageCode
     * @param array $filterPages
     * @param array $filterItems
     * @return mixed
     */
    public static function getCurrentChildrenPages($page = null, $default = null, $withData = false, $languageCode = null, $filterPages = [], $filterItems = [])
    {
        if (is_null($page)) {
            if ($page = self::getCurrentPage()) {
                if ($withData) {
                    return APIHelper::getChildPagesData($page->friendly_url, $languageCode, $filterPages, $filterItems);
                }
            }
        }

        $childPages = collect($page)->get(CMSConstants::CHILDREN, $default);

        if (empty($filterPages)) {
            return $childPages;
        }

        $filteredPages = collect($childPages)
            ->filter(function ($item) use ($filterPages) {
                return in_array($item->friendly_url, $filterPages);
            })
            ->all();

        return $filteredPages;
    }

    /**
     * Return child pages data
     *
     * @param $friendlyUrl
     * @param null $languageCode
     * @param array $filterPages
     * @param array $filterItems
     * @return array|mixed|null|string
     */
    public function getChildPagesDataByFriendlyUrl($friendlyUrl, $languageCode = null, $filterPages = [], $filterItems = [])
    {
        return APIHelper::getChildPagesData($friendlyUrl, $languageCode, $filterPages, $filterItems);
    }

    /**
     * Return global items from session
     *
     * @return mixed
     */
    public static function getGlobalItems()
    {
        return session(CMSConstants::GLOBAL_ITEMS);
    }

    /**
     * Return file path
     *
     * @param $path
     * @return string
     */
    public static function file($path)
    {
        $path = trim($path);

        if (!\GuzzleHttp\Psr7\mimetype_from_filename($path)) {
            return self::url($path);
        }

        if (self::isUrlExternal($path)) {
            return $path;
        }

        $path = remove_leading_slashes($path, '/');

        return file_path_encoded(url($path));
    }

    /**
     * Return a thumbnail file path
     *
     * @param $path
     * @param $width
     * @param $height
     * @param array $options
     * @return mixed
     */
    public static function thumbnail($path, $width = null, $height = null, $options = ['resize'])
    {
        if (is_null($width) && is_null($height)) {
            return self::file($path);
        }

        /** @noinspection PhpUndefinedMethodInspection */
        $thumbnail = remove_leading_slashes(Croppa::url($path, $width, $height, $options), '/');

        return file_path_encoded(url($thumbnail));
    }

    /**
     * Return true if template exists
     *
     * @param $templateName
     * @return bool
     */
    public static function checkIfTemplateExists($templateName)
    {
        if ($site = session(CMSConstants::SITE)) {
            return view()->exists(self::getTemplatePath($templateName));
        }

        return false;
    }

    /**
     * Return true if language exists
     *
     * @param $languageCode
     * @return bool
     */
    public static function checkIfLanguageExists($languageCode)
    {
        if ($siteLanguages = session(CMSConstants::SITE_LANGUAGES)) {
            $codes = collect($siteLanguages)->pluck('code')->map(function ($code) {
                return strtolower($code);
            })->all();
            $languageCode = strtolower($languageCode);
            return in_array($languageCode, $codes);
        }

        return false;
    }

    /**
     * Return url according to site's domain name and language code
     *
     * @param $url
     * @param null $languageCode
     * @return string
     */
    public static function url($url = null, $languageCode = null)
    {
        if (is_null($url)) {
            $url = '';
        }

        $url = trim($url);

        if (\GuzzleHttp\Psr7\mimetype_from_filename($url)) {
            return self::file($url);
        }

        if (self::isUrlExternal($url)) {
            return $url;
        }

        if (is_null($languageCode)) {
            $languageCode = self::getCurrentLanguageCode();
        }

        if ($mainLanguage = self::getSiteMainLanguage()) {
            $languageCode = strtolower($mainLanguage->code) === strtolower($languageCode) ? '' : strtolower($languageCode);
        }

        if (empty(parse_url($url, PHP_URL_PATH))) $url = APIHelper::getCurrentFriendlyUrl();

        $currentLanguageCode = self::getCurrentLanguageCode();

        if (empty($languageCode)) {
            if (preg_match('/^' . preg_quote($currentLanguageCode, '/') . '(\/)?/', $url)) {
                $url = preg_replace('/^' . preg_quote($currentLanguageCode, '/') . '(\/)?/', '', $url);
            }

            $newUrl = '/' . remove_leading_slashes(parse_url($url, PHP_URL_PATH));
        } else {
            if (preg_match('/^(' . preg_quote($languageCode, '/') . '|' . preg_quote($currentLanguageCode, '/') . ')(\/)?/', $url)) {
                $url = preg_replace('/^(' . preg_quote($languageCode, '/') . '|' . preg_quote($currentLanguageCode, '/') . ')(\/)?/', '', $url);
            }

            $newUrl = '/' . $languageCode . '/' . remove_leading_slashes(parse_url($url, PHP_URL_PATH));
        }

        $newUrl .= parse_url($url, PHP_URL_FRAGMENT) ?: '';

        $newUrl = remove_trailing_slashes($newUrl);


        $leading = '';
        if (session(CMSConstants::CMS_PAGE_PREVIEW_ACTIVE, false)) {
            $leading = APIHelper::getHostUrl();
        }

        return empty($newUrl) ? $leading . '/' : $leading . $newUrl;
    }

    /**
     * Return true if url is external
     *
     * @param $url
     * @return bool
     */
    public static function isUrlExternal($url)
    {
        $url = trim($url);

        $components = parse_url($url);

        $sample = '';

        if (isset($components['scheme']) && !empty($components['host'])) return true;

        if (isset($components['path']) && !empty($components['path'])) $sample = $components['path'];

        if (isset($components['host']) && !empty($components['host'])) $sample = $components['host'];

        preg_match('/(?:^www\.)?(?:[a-zA-Z][^\/\\\]+)(?:\.[a-zA-Z][^\/\\\]{1,})(?:.*)/', $sample, $matches);

        if (empty($matches)) return false;

        return !(\GuzzleHttp\Psr7\mimetype_from_filename($url) && $matches[0] !== $sample);
    }

    /**
     * Return a variable name
     *
     * @param $object
     * @param null $default
     * @return mixed
     */
    public static function getVariableName($object, $default = null)
    {
        return collect($object)->get(CMSConstants::VARIABLE_NAME, $default);
    }

    /**
     * Return a display order
     *
     * @param $object
     * @param $default
     * @return mixed
     */
    public static function getDisplayOrder($object, $default = INF)
    {
        return collect($object)->get(CMSConstants::DISPLAY_ORDER, $default);
    }

    /**
     * Return a sorted array object
     *
     * @param $array
     * @param string $by
     * @param bool $ascending
     * @param null $default
     * @return array|null
     */
    public static function sortArrayObject($array, $by = CMSConstants::DISPLAY_ORDER, $ascending = true, $default = null)
    {
        if (!$array) return $default;

        $array = collect($array);

        if ($ascending) {
            $sorted = $array->sortBy(function ($value) use ($by) {
                if ($by === CMSConstants::DISPLAY_ORDER) {
                    return self::getDisplayOrder(collect($value)->get($by));
                } else {
                    return collect($value)->get($by);
                }
            });
        } else {
            $sorted = $array->sortByDesc(function ($value) use ($by) {
                if ($by === CMSConstants::DISPLAY_ORDER) {
                    return self::getDisplayOrder(collect($value)->get($by));
                } else {
                    return collect($value)->get($by);
                }
            });
        }

        return $sorted->all();
    }

    /**
     * Return true if the current url is the same as the input url
     *
     * @param $url
     * @return bool
     */
    public static function compareCurrentUrl($url)
    {
        if (!$url) return false;

        $currentUrl = remove_trailing_slashes(remove_leading_slashes(APIHelper::getCurrentFriendlyUrl()));
        $url = remove_trailing_slashes(remove_leading_slashes($url));

        return $currentUrl === $url;
    }

    /**
     * Return site map data
     *
     * @param array $exceptions
     * @return array|mixed|null|string
     */
    public static function getSiteMapData($exceptions = [])
    {
        return APIHelper::getSiteMapData($exceptions);
    }

    /**
     * Page
     */

    /**
     * Return pages by categories
     *
     * @param $categoryNames
     * @param null $languageCode
     * @param array $filterItems
     * @return array|mixed|null
     */
    public static function getPagesByCategories($categoryNames, $languageCode = null, $filterItems = [])
    {
        if (!$categoryNames) return null;

        if (!is_array($categoryNames)) {
            $categoryNames = array($categoryNames);
        }

        $categoryNames = collect($categoryNames)
            ->map(function ($categoryName) {
                if (is_string($categoryName)) {
                    if (!!preg_match('/,/', $categoryName)) {
                        return explode(',', $categoryName);
                    }
                }
                return $categoryName;
            })
            ->flatten()
            ->map(function ($categoryName) {
                $name = preg_replace('/[\s-]+/', '_', trim(strtoupper($categoryName)));
                $name = preg_replace('/_{2,}/', '_', $name);
                return $name;
            })
            ->all();

        $data = null;

        if ($pages = APIHelper::getPagesByCategories($categoryNames, $languageCode, $filterItems)) {
            return $pages;
        }

        return $data;
    }

    /**
     * PAGE ITEM
     */

    /**
     * Return if page item exists
     *
     * @param $variableName
     * @param $pageData
     * @param bool $strict
     * @return bool|null
     */
    public static function checkIfPageItemExists($variableName, $pageData = null, $strict = false)
    {
        if (!$variableName) return false;

        if ($pageData = self::getCurrentPageData($pageData)) {
            if (!$strict) {
                $pageData = array_change_key_case((array)$pageData, CASE_LOWER);
                $variableName = strtolower($variableName);
            }

            return collect($pageData)->has($variableName);
        }

        return false;
    }

    /**
     * Return true if page item option exists
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $pageData
     * @param bool $strict
     * @return bool|null
     */
    public static function checkIfPageItemOptionExists($itemVariableName, $optionVariableName, $pageData = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return false;

        if ($item = self::getPageItemByVariableName($itemVariableName, $pageData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            return collect($item)->has($optionVariableName);
        }

        return false;
    }

    /**
     * Return page item by variable name
     *
     * @param $variableName
     * @param $pageData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getPageItemByVariableName($variableName, $pageData = null, $default = null, $strict = false)
    {
        if (!$variableName) return $default;

        if ($pageData = self::getCurrentPageData($pageData)) {
            if (!$strict) {
                $pageData = array_change_key_case((array)$pageData, CASE_LOWER);
                $variableName = strtolower($variableName);
            }

            $byVariableName = collect($pageData)->get($variableName);
            $byTemplate = collect($pageData)->filter(function ($data) use ($variableName) {
                return $data->{CMSConstants::TEMPLATE_NAME} === $variableName;
            })->first();

            return is_null($byVariableName)
                ? is_null($byTemplate)
                    ? $default
                    : $byTemplate
                : $byVariableName;
        }

        return $default;
    }

    /**
     * Return page item by categories
     *
     * @param $categoryNames
     * @param $pageData
     * @param null $default
     * @param bool $strict
     * @return array|null
     */
    public static function getPageItemByCategories($categoryNames, $pageData = null, $default = null, $strict = false)
    {
        if (!$categoryNames) return $default;

        if (!is_array($categoryNames)) $categoryNames = array($categoryNames);

        $data = $default;

        if ($pageData = self::getCurrentPageData($pageData)) {
            $return = collect($pageData)->filter(function ($value) use ($strict, $categoryNames) {
                if ($categories = collect($value)->get(CMSConstants::CATEGORIES_KEY)) {
                    if (!is_array($categories)) $categories = array($categories);

                    if (!$strict) {
                        $categories = array_map('strtoupper', $categories);
                        $categoryNames = array_map('strtoupper', $categoryNames);
                    }

                    return !empty(array_intersect($categories, $categoryNames));
                }
                return false;
            })->all();

            $data = empty($return) ? $default : $return;
        }

        return $data;
    }

    /**
     * Return page item by variable name and categories
     *
     * @param $variableName
     * @param $categoryNames
     * @param $pageData
     * @param null $default
     * @param bool $strict
     * @return array|null
     */
    public static function getPageItemByVariableNameAndCategory($variableName, $categoryNames, $pageData = null, $default = null, $strict = false)
    {
        $data = $default;
        if ($item = self::getPageItemByVariableName($variableName, $pageData, null, $strict)) {
            return self::getPageItemByCategories($categoryNames, $pageData, $default, $strict);
        }

        return $data;
    }

    /**
     * Return page item's categories
     *
     * @param $variableName
     * @param $pageData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getPageItemCategories($variableName, $pageData = null, $default = null, $strict = false)
    {
        if (!$variableName) return $default;

        $data = $default;

        if ($item = self::getPageItemByVariableName($variableName, $pageData, null, $strict)) {
            $data = collect($item)->get(CMSConstants::CATEGORIES_KEY, $default);
        }

        return $data;
    }

    /**
     * Return page item option by its variable name from page item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $pageData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getPageItemOption($itemVariableName, $optionVariableName, $pageData = null, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getPageItemByVariableName($itemVariableName, $pageData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $data = collect($item)->get($optionVariableName, $default);
        }

        return $data;
    }

    /**
     * Return page item option's type and value by its variable name from page item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $pageData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getPageItemOptionType($itemVariableName, $optionVariableName, $pageData, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getPageItemByVariableName($itemVariableName, $pageData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $data = collect($item)->get($optionVariableName . CMSConstants::OPTION_TYPE, $default);
        }

        return $data;
    }

    /**
     * Return page item option's element type and value by its variable name from page item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $pageData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getPageItemOptionElementTypeAndValue($itemVariableName, $optionVariableName, $pageData = null, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getPageItemByVariableName($itemVariableName, $pageData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $return = collect($item)->only([
                $optionVariableName . CMSConstants::ELEMENT_TYPE,
                $optionVariableName . CMSConstants::ELEMENT_VALUE
            ]);

            $data = empty($return) ? $default : json_decode($return->toJson());
        }

        return $data;
    }

    /**
     * Return variable name list of page item options from a page item
     *
     * @param $variableName
     * @param $pageData
     * @param null $default
     * @param bool $strict
     * @return array|null
     */
    public static function listPageItemOptionsVariableName($variableName, $pageData = null, $default = null, $strict = false)
    {
        if (!$variableName) return $default;

        $data = $default;

        if ($item = self::getPageItemByVariableName($variableName, $pageData, null, $strict)) {
            $keys = collect($item)->keys();
            $exceptions = [
                CMSConstants::OPTION_TYPE,
                CMSConstants::ELEMENT_TYPE,
                CMSConstants::ELEMENT_VALUE,
                '^' . CMSConstants::CATEGORIES_KEY
            ];
            $pregExceptions = join('|', $exceptions);
            if (!empty($keys)) {
                $data = $keys->filter(function ($value) use ($pregExceptions) {
                    return !preg_match('/(' . preg_quote($pregExceptions, '/') . ')/', $value);
                })->all();
            }
        }

        return $data;
    }

    /**
     * TEMPLATE ITEM
     */

    /**
     * Return true if template item exists
     *
     * @param $variableName
     * @param $templateData
     * @param bool $strict
     * @return bool|null
     */
    public static function checkIfTemplateItemExists($variableName, $templateData = null, $strict = false)
    {
        if (!$variableName) return false;

        if ($templateData = self::getCurrentTemplateData($templateData)) {
            if (!$strict) {
                $templateData = array_change_key_case((array)$templateData, CASE_LOWER);
                $variableName = strtolower($variableName);
            }

            return collect($templateData)->has($variableName);
        }

        return false;
    }

    /**
     * Return true if template item option exists
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $templateData
     * @param bool $strict
     * @return bool|null
     */
    public static function checkIfTemplateItemOptionExists($itemVariableName, $optionVariableName, $templateData = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return false;

        if ($item = self::getTemplateItemByVariableName($itemVariableName, $templateData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            return collect($item)->has($optionVariableName);
        }

        return false;
    }

    /**
     * Return template item by variable name
     *
     * @param $variableName
     * @param $templateData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getTemplateItemByVariableName($variableName, $templateData = null, $default = null, $strict = false)
    {
        if (!$variableName) return $default;

        if ($templateData = self::getCurrentTemplateData($templateData)) {
            if (!$strict) {
                $templateData = array_change_key_case((array)(array)$templateData, CASE_LOWER);
                $variableName = strtolower($variableName);
            }

            $byVariableName = collect($templateData)->get($variableName);
            $byTemplate = collect($templateData)->filter(function ($data) use ($variableName) {
                return $data->{CMSConstants::TEMPLATE_NAME} === $variableName;
            })->first();

            return is_null($byVariableName)
                ? is_null($byTemplate)
                    ? $default
                    : $byTemplate
                : $byVariableName;
        }

        return $default;
    }

    /**
     * Return template item option by its variable name and template item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $templateData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getTemplateItemOption($itemVariableName, $optionVariableName, $templateData = null, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getTemplateItemByVariableName($itemVariableName, $templateData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $data = collect($item)->get($optionVariableName, $default);
        }

        return $data;
    }

    /**
     * Return template item option's type by its variable name and template item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $templateData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getTemplateItemOptionType($itemVariableName, $optionVariableName, $templateData = null, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getTemplateItemByVariableName($itemVariableName, $templateData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $data = collect($item)->get($optionVariableName . CMSConstants::OPTION_TYPE, $default);
        }

        return $data;
    }

    /**
     * Return template item option's element type and value by its variable name and template item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $templateData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getTemplateItemOptionElementTypeAndValue($itemVariableName, $optionVariableName, $templateData = null, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getTemplateItemByVariableName($itemVariableName, $templateData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $return = collect($item)->only([
                $optionVariableName . CMSConstants::ELEMENT_TYPE,
                $optionVariableName . CMSConstants::ELEMENT_VALUE
            ]);

            $data = empty($return) ? $default : json_decode($return->toJson());
        }

        return $data;
    }

    /**
     * Return variable name list of template item options from template item
     *
     * @param $variableName
     * @param $templateData
     * @param null $default
     * @param bool $strict
     * @return array|null
     */
    public static function listTemplateItemOptionsVariableName($variableName, $templateData = null, $default = null, $strict = false)
    {
        if (!$variableName) return $default;

        $data = $default;

        if ($item = self::getTemplateItemByVariableName($variableName, $templateData, null, $strict)) {
            $keys = collect($item)->keys();
            $exceptions = [
                CMSConstants::OPTION_TYPE,
                CMSConstants::ELEMENT_TYPE,
                CMSConstants::ELEMENT_VALUE,
                '^' . CMSConstants::CATEGORIES_KEY
            ];
            $pregExceptions = join('|', $exceptions);
            if (!empty($keys)) {
                $data = $keys->filter(function ($value) use ($pregExceptions) {
                    return !preg_match('/(' . preg_quote($pregExceptions, '/') . ')/', $value);
                })->all();
            }
        }

        return $data;
    }

    /**
     * GLOBAL ITEM
     */

    /**
     * Return true if global item exists
     *
     * @param $variableName
     * @param $globalItemData
     * @param bool $strict
     * @return bool|null
     */
    public static function checkIfGlobalItemExists($variableName, $globalItemData = null, $strict = false)
    {
        if (!$variableName) return false;

        if (is_null($globalItemData)) {
            $globalItemData = self::getGlobalItems();
        }

        if ($globalItemData) {
            if (!$strict) {
                $globalItemData = array_change_key_case((array)$globalItemData, CASE_LOWER);
                $variableName = strtolower($variableName);
            }

            return collect($globalItemData)->has($variableName);
        }

        return false;
    }

    /**
     * Return true if global item option exists
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $globalItemData
     * @param bool $strict
     * @return bool|null
     */
    public static function checkIfGlobalItemOptionExists($itemVariableName, $optionVariableName, $globalItemData = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return false;

        if ($item = self::getGlobalItemByVariableName($itemVariableName, $globalItemData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            return collect($item)->has($optionVariableName);
        }

        return false;
    }

    /**
     * Return global item by its variable name
     *
     * @param $variableName
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getGlobalItemByVariableName($variableName, $globalItemData = null, $default = null, $strict = false)
    {
        if (!$variableName) return $default;

        $data = $default;

        if (is_null($globalItemData)) {
            $globalItemData = self::getGlobalItems();
        }

        if ($globalItemData) {
            if (!$strict) {
                $globalItemData = array_change_key_case((array)$globalItemData, CASE_LOWER);
                $variableName = strtolower($variableName);
            }

            $byVariableName = collect($globalItemData)->get($variableName);
            $byTemplate = collect($globalItemData)->filter(function ($data) use ($variableName) {
                return $data->{CMSConstants::TEMPLATE_NAME} === $variableName;
            })->first();

            $data = is_null($byVariableName)
                ? is_null($byTemplate)
                    ? $default
                    : $byTemplate
                : $byVariableName;
        }

        return $data;
    }

    /**
     * Return global item by its categories
     *
     * @param $categoryNames
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return array|null
     */
    public static function getGlobalItemByCategories($categoryNames, $globalItemData = null, $default = null, $strict = false)
    {
        if (!$categoryNames) return $default;

        if (!is_array($categoryNames)) {
            $categoryNames = array($categoryNames);
        }

        $categoryNames = collect($categoryNames)
            ->map(function ($categoryName) {
                if (is_string($categoryName)) {
                    if (!!preg_match('/,/', $categoryName)) {
                        return explode(',', $categoryName);
                    }
                }
                return $categoryName;
            })
            ->flatten()
            ->map(function ($categoryName) {
                return preg_replace('/\s+/', '_', trim(strtoupper($categoryName)));
            })
            ->all();

        $data = $default;

        if (is_null($globalItemData)) {
            $globalItemData = self::getGlobalItems();
        }

        if ($globalItemData) {
            $return = collect($globalItemData)->filter(function ($value) use ($strict, $categoryNames) {
                if ($categories = collect($value)->get(CMSConstants::CATEGORIES_KEY)) {
                    if (!is_array($categories)) $categories = array($categories);

                    if (!$strict) {
                        $categories = array_map('strtoupper', $categories);
                        $categoryNames = array_map('strtoupper', $categoryNames);
                    }

                    return !empty(array_intersect($categories, $categoryNames));
                }
                return false;
            })->all();

            $data = empty($return) ? $default : $return;
        }

        return $data;
    }

    /**
     * Return global item by its variable name and categories
     *
     * @param $variableName
     * @param $categoryNames
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return array|null
     */
    public static function getGlobalItemByVariableNameAndCategory($variableName, $categoryNames, $globalItemData = null, $default = null, $strict = false)
    {
        $data = $default;
        if ($item = self::getGlobalItemByVariableName($variableName, $globalItemData, null, $strict)) {
            return self::getGlobalItemByCategories($categoryNames, $globalItemData, $default, $strict);
        }

        return $data;
    }

    /**
     * Return global item's categories
     *
     * @param $variableName
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getGlobalItemCategories($variableName, $globalItemData = null, $default = null, $strict = false)
    {
        if (!$variableName) return $default;

        $data = $default;

        if ($item = self::getGlobalItemByVariableName($variableName, $globalItemData, null, $strict)) {
            $data = collect($item)->get(CMSConstants::CATEGORIES_KEY, $default);
        }

        return $data;
    }

    /**
     * Return global item option's value by its variable name and global item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getGlobalItemOptionValue($itemVariableName, $optionVariableName, $globalItemData = null, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getGlobalItemByVariableName($itemVariableName, $globalItemData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $data = collect($item)->get($optionVariableName, $default);
        }

        return $data;
    }

    /**
     * Return global item option's type by its variable name and global item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getGlobalItemOptionType($itemVariableName, $optionVariableName, $globalItemData = null, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getGlobalItemByVariableName($itemVariableName, $globalItemData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $data = collect($item)->get($optionVariableName . CMSConstants::OPTION_TYPE, $default);
        }

        return $data;
    }

    /**
     * Return global item option's element type and value by its variable name and global item data
     *
     * @param $itemVariableName
     * @param $optionVariableName
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return mixed|null
     */
    public static function getGlobalItemOptionElementTypeAndValue($itemVariableName, $optionVariableName, $globalItemData = null, $default = null, $strict = false)
    {
        if (!$itemVariableName || !$optionVariableName) return $default;

        $data = $default;

        if ($item = self::getGlobalItemByVariableName($itemVariableName, $globalItemData, null, $strict)) {
            if (!$strict) {
                $item = array_change_key_case((array)$item, CASE_LOWER);
                $optionVariableName = strtolower($optionVariableName);
            }

            $element = collect($item)->only([
                $optionVariableName . CMSConstants::ELEMENT_TYPE,
                $optionVariableName . CMSConstants::ELEMENT_VALUE
            ]);

            $data = empty($element) ? $default : json_decode($element->toJson());
        }

        return $data;
    }

    /**
     * Return a global item's parent
     *
     * @param $variableName
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return null
     */
    public static function getGlobalItemParent($variableName, $globalItemData = null, $default = null, $strict = false)
    {
        if ($item = self::getGlobalItemByVariableName($variableName, $globalItemData, null, $strict)) {
            $parent = collect($item)->get(CMSConstants::PARENT);
            $return = collect($parent)
                ->flatten()
                ->values()
                ->all();

            return empty($return) ? $default : $return;
        }

        return $default;
    }

    /**
     * Return global item's children
     *
     * @param $variableName
     * @param $globalItemData
     * @param null $default
     * @param bool $strict
     * @return null
     */
    public static function getGlobalItemChildren($variableName, $globalItemData = null, $default = null, $strict = false)
    {
        if ($item = self::getGlobalItemByVariableName($variableName, $globalItemData, null, $strict)) {
            $children = collect($item)->get(CMSConstants::CHILDREN);
            $return = collect($children)
                ->map(function ($child) {
                    return collect($child)
                        ->flatten()
                        ->values()
                        ->all();
                })
                ->flatten()
                ->values()
                ->all();

            return empty($return) ? $default : $return;
        }

        return $default;
    }

    /**
     * Return variable name list of global item options from global item data
     *
     * @param $variableName
     * @param $globalItemData
     * @param bool $strict
     * @return array|null
     */
    public static function listGlobalItemOptionsVariableName($variableName, $globalItemData = null, $strict = false)
    {
        if (!$variableName) return null;

        $data = null;

        if ($item = self::getGlobalItemByVariableName($variableName, $globalItemData, null, $strict)) {
            $keys = collect($item)->keys();
            $exceptions = [
                CMSConstants::OPTION_TYPE,
                CMSConstants::ELEMENT_TYPE,
                CMSConstants::ELEMENT_VALUE,
                '^' . CMSConstants::CATEGORIES_KEY
            ];
            $pregExceptions = join('|', $exceptions);
            if (!empty($keys)) {
                $data = $keys->filter(function ($value) use ($pregExceptions) {
                    return !preg_match('/(' . preg_quote($pregExceptions, '/') . ')/', $value);
                })->all();
            }
        }

        return $data;
    }

    /**
     * PAGE ITEM + TEMPLATE ITEM
     */

    /**
     * Return prepare templates
     *
     * @param array $data
     * @param string $templatePathPrefix
     * @param array $variableNameDelimiters
     * @return array
     */
    public static function prepareTemplates($data = [], $templatePathPrefix = 'templates', $variableNameDelimiters = ['-', '_'])
    {
        $result = [];

        if (empty($data)) {
            $pageItemData = self::getCurrentPageData();

            if (empty($pageItemData)) return $result;

            foreach ($pageItemData as $pageItemDatum) {
                if ($templateName = isset_not_empty($pageItemDatum->{CMSConstants::TEMPLATE_NAME})) {
                    $data[] = [
                        CMSConstants::TEMPLATE_PATH => $templateName,
                        CMSConstants::PAGE_ITEM_KEY => $pageItemDatum
                    ];
                }
            }
        }

        if (!is_array($data) || empty($data)) return $result;

        $data = collect($data);

        //Exclusion
        $excluded = $data->filter(function ($value) {
            return collect($value)->has(CMSConstants::PAGE_ITEM_KEY)
            && collect($value)->has(CMSConstants::TEMPLATE_PATH);
        });

        //Sorting
        $sorted = $excluded->sortBy(function ($value) {
            $value = collect($value);
            return self::getDisplayOrder($value->get(CMSConstants::PAGE_ITEM_KEY));
        });

        //Template path
        $regex = (empty($variableNameDelimiters))
            ? '(-|_)'
            : '(' . join('|', $variableNameDelimiters) . ')';
        $emptyPath = self::getTemplatePath('');
        $sorted->each(function ($value) use ($emptyPath, $templatePathPrefix, $variableNameDelimiters, $regex, &$result) {
            if (!preg_match('/^(' . preg_quote($emptyPath, '/') . ')/', $value[CMSConstants::TEMPLATE_PATH])) {
                $path = empty($templatePathPrefix)
                    ? $value[CMSConstants::TEMPLATE_PATH]
                    : $templatePathPrefix . '.' . $value[CMSConstants::TEMPLATE_PATH];

                $templatePath = '';

                if (!empty($variableNameDelimiters)) {
                    if (!is_array($variableNameDelimiters)) $variableNameDelimiters = array($variableNameDelimiters);

                    foreach ($variableNameDelimiters as $variableNameDelimiter) {
                        $path = preg_replace('/' . $regex . '/', $variableNameDelimiter, $path);
                        $templatePath = self::getTemplatePath($path);
                        if (view()->exists($templatePath)) {
                            break;
                        }
                    }
                }

                $value[CMSConstants::TEMPLATE_PATH] = $templatePath;

                if (view()->exists($templatePath)) {
                    $result[] = $value;
                }
            }
        });

        return $result;
    }

    /**
     * Return an item whether it is page, template, or global item
     *
     * @param $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null
     */
    public static function getItem($pageItemVariableName, $templateItemVariableName = null, $globalItemVariableName = null)
    {
        if (empty($pageItemVariableName)) return null;

        if (empty($templateItemVariableName)) $templateItemVariableName = $pageItemVariableName;

        if (empty($globalItemVariableName)) $globalItemVariableName = $pageItemVariableName;

        $pageItem = self::getPageItemByVariableName($pageItemVariableName);

        $templateItem = $templateItemVariableName === false
            ? null
            : self::getTemplateItemByVariableName($templateItemVariableName);

        $globalItem = $globalItemVariableName === false
            ? null
            : self::getGlobalItemByVariableName($globalItemVariableName);

        return $pageItem === null
            ? ($templateItem === null ? $globalItem : $templateItem)
            : $pageItem;
    }

    /**
     * Return a item option whether it's from template item or page item
     *
     * @param $pageItem
     * @param $primaryKey
     * @param null $default
     * @return mixed|null
     */
    public static function getItemOption($pageItem, $primaryKey, $default = null)
    {
        if (is_null($primaryKey)) return $default;

        $pageItemOption = null;

        if (!is_null($pageItem)) {
            if (isset($pageItem->{$primaryKey})) {
                $pageItemOption = $pageItem->{$primaryKey};
            }
        }

        if ($pageItemOption === null) return $default;

        return $pageItemOption;
    }

    /**
     * FORM
     */

    /**
     * Return form data by its global item variable name
     *
     * @param $variableName
     * @return mixed|null
     */
    public static function generateFormByVariableName($variableName)
    {
        if ($formData = APIHelper::getFormPropertyData($variableName)) {
            $site = CMSHelper::getSite();
            $apiDomain = config('cms.api.domain');
            $url = config('cms.api.urls.helpers.post_form_property_data');

            if (is_null($site) || is_null($apiDomain) || is_null($url)) return null;

            $url = APIHelper::replaceUrlParameters($url, [
                'domain_name' => $site->domain_name,
                'variable_name' => $variableName
            ]);

            $url = remove_trailing_slashes($apiDomain, '/') . remove_leading_slashes($url);

            $data = [
                'method' => 'POST',
                'action' => $url,
                'properties' => $formData
            ];

            return json_decode(json_encode($data), false);
        }

        return null;
    }

    /**
     * Return a honey-pot html tag
     *
     * @return string
     */
    public static function generateHoneypotField()
    {
        $name = CMSConstants::HONEY_POT_FIELD;
        return "<input type='hidden' name='$name' value=''/>";
    }

    /**
     * Return a cms-form-token html tag
     *
     * @return string
     */
    public static function generateFormTokenField()
    {
        $hash = config('cms.api.form_token');
        $name = CMSConstants::FORM_TOKEN_FIELD;
        return "<input type='hidden' name='$name' value='$hash'/>";
    }

    /**
     * Return an override sender email html tag
     *
     * @param string $email
     * @return string
     */
    public static function generateFormOverrideSenderEmailField($email = '')
    {
        $name = CMSConstants::FORM_OVERRIDE_SENDER_EMAIL;
        return "<input type='hidden' name='$name' value='$email'>";
    }

    /**
     * Return an override recipient emails html tag
     *
     * @param string $emails
     * @return string
     */
    public static function generateFormOverrideRecipientEmailsField($emails = '')
    {
        $name = CMSConstants::FORM_OVERRIDE_RECIPIENT_EMAILS;
        return "<input type='hidden' name='$name' value='$emails'>";
    }

    /**
     * Return an override cc emails html tag
     *
     * @param string $emails
     * @return string
     */
    public static function generateFormOverrideCCEmailsField($emails = '')
    {
        $name = CMSConstants::FORM_OVERRIDE_CC_EMAILS;
        return "<input type='hidden' name='$name' value='$emails'>";
    }

    /**
     * Return an override bcc emails html tag
     *
     * @param string $emails
     * @return string
     */
    public static function generateFormOverrideBCCEmailsField($emails = '')
    {
        $name = CMSConstants::FORM_OVERRIDE_BCC_EMAILS;
        return "<input type='hidden' name='$name' value='$emails'>";
    }

    /**
     * Return a cms-application-token html tag
     *
     * @return string
     */
    public static function generateCMSApplicationNameField()
    {
        $applicationName = config('cms.application_name');
        $name = CMSConstants::CMS_APPLICATION_NAME_FIELD;
        return "<input type='hidden' name='$name' value='$applicationName'/>";
    }

    /**
     * Return generated link meta tags
     *
     * @param array $exceptions
     * @param null $defaultHref
     * @return string
     */
    public static function generateAlternateLinkMeta($exceptions = [], $defaultHref = null)
    {
        $return = '';

        if ($siteLanguages = self::getSiteLanguages()) {
            if (!empty($siteLanguages)) {
                $urlComponent = parse_url(url()->current());
                $baseUrl = (empty($urlComponent['scheme'])) ? 'http://' . $urlComponent['host'] : $urlComponent['scheme'] . '://' . $urlComponent['host'];
                $baseUrl = remove_trailing_slashes($baseUrl);
                $currentLanguageCode = self::getCurrentLanguageCode();
                $friendlyUrl = remove_leading_slashes(preg_replace('/^' . preg_quote($currentLanguageCode, '/') . '/', '', APIHelper::getCurrentFriendlyUrl()), '/');

                if (is_null($defaultHref)) {
                    $return .= '<link rel="alternate" href="' . $baseUrl . $friendlyUrl . '" hreflang="x-default" />' . PHP_EOL;
                } else {
                    $return .= '<link rel="alternate" href="' . $defaultHref . '" hreflang="x-default" />' . PHP_EOL;
                }

                foreach ($siteLanguages as $siteLanguage) {
                    if (!in_array($siteLanguage->code, $exceptions)) {
                        $hreflang = (empty($siteLanguage->hreflang)) ? $siteLanguage->code : $siteLanguage->hreflang;
                        $return .= '<link rel="alternate" href="' . $baseUrl . '/' . $siteLanguage->code . $friendlyUrl . '" hreflang="' . strtolower($hreflang) . '" />' . PHP_EOL;
                    }
                }
            }
        }

        return $return;
    }


    /**
     * Return page metadata html tags
     *
     * @param $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null
     */
    public static function generatePageMetadata($pageItemVariableName = 'metadata', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $metadata */
        $metadata = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($metadata)) return null;

        $return = '';

        if ($title = isset_not_empty($metadata->title)) {
            $return .= "<title>$title</title>" . PHP_EOL;
        } else {
            $return .= "<title></title>" . PHP_EOL;
        }

        if ($description = isset_not_empty($metadata->description)) {
            $return .= "<meta name='description' content='$description'/>" . PHP_EOL;
        } else {
            $return .= "<meta name='description' content=''/>" . PHP_EOL;
        }

        if ($keywords = isset_not_empty($metadata->keywords)) {
            $return .= "<meta name='keywords' content='$keywords'/>" . PHP_EOL;
        } else {
            $return .= "<meta name='keywords' content=''/>" . PHP_EOL;
        }

        if ($author = isset_not_empty($metadata->author)) {
            $return .= "<meta name='author' content='$keywords'/>" . PHP_EOL;
        } else {
            $return .= "<meta name='author' content=''/>" . PHP_EOL;
        }

        if ($canonicalUrl = isset_not_empty($metadata->canonical_url)) {
            $return .= '<link rel="canonical" href="' . $canonicalUrl . '"/>' . PHP_EOL;
        }

        return $return;
    }

    /**
     * Return a favicon html tag
     *
     * @param string $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateFavicon($pageItemVariableName = 'favicon', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $favicon */
        $favicon = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($favicon)) return null;

        $return = '';

        if ($icon = isset_not_empty($favicon->icon)) {
            $icon = self::thumbnail($icon);
            if ($type = \GuzzleHttp\Psr7\mimetype_from_filename($icon)) {
                $return .= '<link rel="shortcut icon" href="' . $icon . '" type="' . $type . '">' . PHP_EOL;
            } else {
                $return .= '<link rel="shortcut icon" href="' . $icon . '">' . PHP_EOL;
            }
        }

        return $return;
    }

    /**
     * Return a group of favicon metadata
     *
     * @param string $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateFaviconGroup($pageItemVariableName = 'favicon_group', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $faviconGroup */
        $faviconGroup = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($faviconGroup)) return null;

        $return = '';

        if ($defaultIcon = isset_not_empty($faviconGroup->default_icon)) {
            $defaultIcon = self::thumbnail($defaultIcon);
            if ($type = \GuzzleHttp\Psr7\mimetype_from_filename($defaultIcon)) {
                $return .= '<link rel="shortcut icon" href="' . $defaultIcon . '" type="' . $type . '">' . PHP_EOL;
            } else {
                $return .= '<link rel="shortcut icon" href="' . $defaultIcon . '">' . PHP_EOL;
            }
        }

        if ($icons = isset_not_empty($faviconGroup->icons)) {
            try {
                if (!empty($icons)) {
                    foreach ($icons as $icon) {
                        $href = self::thumbnail($icon->icon);
                        $sizes = isset_not_empty($icon->sizes);
                        if ($type = \GuzzleHttp\Psr7\mimetype_from_filename($href)) {
                            $return .= '<link rel="icon" type="' . $type . '" href="' . $href . '" sizes="' . $sizes . '">' . PHP_EOL;
                        } else {
                            $return .= '<link rel="icon" type="image/png" href="' . $href . '" sizes="' . $sizes . '">' . PHP_EOL;
                        }
                    }
                }
            } catch (\Exception $exception) {
            }
        }

        return $return;
    }

    /**
     * Return an Apple touch icon html tag
     *
     * @param string $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateAppleTouchIcon($pageItemVariableName = 'apple_touch_icon', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $appleTouchIcon */
        $appleTouchIcon = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($appleTouchIcon)) return null;

        $icon = isset_not_empty($appleTouchIcon->icon);
        $sizes = isset_not_empty($appleTouchIcon->sizes);

        if (empty($icon)) return null;

        $icon = self::thumbnail($icon);

        $return = (!empty($icon) && !empty($sizes))
            ? '<link rel="apple-touch-icon" sizes="' . $sizes . '" href="' . $icon . '">' . PHP_EOL
            : '';

        return $return;
    }

    /**
     * Return a group of apple touch icon metadata
     *
     * @param string $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateAppleTouchIconGroup($pageItemVariableName = 'apple_touch_icon_group', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $appleTouchIconGroup */
        $appleTouchIconGroup = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($appleTouchIconGroup)) return null;

        $return = '';

        if ($icons = isset_not_empty($appleTouchIconGroup->icons)) {
            try {
                if (!empty($icons)) {
                    foreach ($icons as $icon) {
                        $href = isset_not_empty($icon->icon);
                        $sizes = isset_not_empty($icon->sizes);
                        $href = self::thumbnail($href);
                        $return .= (!empty($href) && !empty($sizes))
                            ? '<link rel="apple-touch-icon" sizes="' . $sizes . '" href="' . $href . '">' . PHP_EOL
                            : '';
                    }
                }
            } catch (\Exception $exception) {
            }
        }

        return $return;
    }

    /**
     * Return a MS application icon html tag
     *
     * @param string $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateMSApplicationIcon($pageItemVariableName = 'ms_application_icon', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $msApplicationIcon */
        $msApplicationIcon = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($msApplicationIcon)) return null;

        $icon = isset_not_empty($msApplicationIcon->icon);
        $name = isset_not_empty($msApplicationIcon->name);

        if (empty($icon)) return null;

        $icon = self::thumbnail($icon);

        $return = (!empty($icon) && !empty($name))
            ? "<meta name='$name' content='$icon'>" . PHP_EOL
            : '';

        return $return;
    }

    /**
     * Return a group of MS application icon metadata
     *
     * @param string $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateMSApplicationIconGroup($pageItemVariableName = 'ms_application_icon_group', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $msApplicationIconGroup */
        $msApplicationIconGroup = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($msApplicationIconGroup)) return null;

        $return = '';

        if ($icons = isset_not_empty($msApplicationIconGroup->icons)) {
            try {
                if (!empty($icons)) {
                    foreach ($icons as $icon) {
                        $content = isset_not_empty($icon->icon);
                        $name = isset_not_empty($icon->name);
                        $content = self::thumbnail($content);
                        $return .= (!empty($content) && !empty($name))
                            ? "<meta name='$name' content='$content'>" . PHP_EOL
                            : '';
                    }
                }
            } catch (\Exception $exception) {
            }
        }

        return $return;
    }

    /**
     * Return Google+ metadata html tags
     *
     * @param $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateGooglePlusMetadata($pageItemVariableName = 'google_plus_metadata', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $googlePlusMetadata */
        $googlePlusMetadata = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($googlePlusMetadata)) return null;

        $return = collect($googlePlusMetadata)
            ->map(function ($value, $key) {
                if (empty($value)) return null;

                switch ($key) {
                    case 'name':
                    case 'description':
                    case 'url':
                        return "<meta itemprop='$key' content='$value'>" . PHP_EOL;
                    case 'alternate_name':
                        return "<meta itemprop='alternateName' content='$value'>" . PHP_EOL;
                    case 'image':
                        $image = self::thumbnail($value);
                        return "<meta itemprop='image' content='$image'>" . PHP_EOL;
                    default:
                        return null;
                }
            })
            ->filter()
            ->toArray();

        if (empty($return)) return null;

        return join('', $return);
    }

    /**
     * Return Open Graph metadata html tags
     *
     * @param $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateOpenGraphMetadata($pageItemVariableName = 'open_graph_metadata', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $openGraphMetadata */
        $openGraphMetadata = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($openGraphMetadata)) return null;

        $return = collect($openGraphMetadata)
            ->map(function ($value, $key) {
                if (empty($value)) return null;

                switch ($key) {
                    case 'type':
                    case 'title':
                    case 'description':
                    case 'url':
                    case 'site_name':
                        return "<meta property='og:$key' content='$value'>" . PHP_EOL;
                    case 'facebook_admin_id':
                        return "<meta property='fb:admins' content='$value'>" . PHP_EOL;
                    case 'image':
                        $image = self::thumbnail($value);
                        return "<meta property='og:$key' content='$image'>" . PHP_EOL;
                    default:
                        return null;
                }
            })
            ->filter()
            ->toArray();

        if (empty($return)) return null;

        return join('', $return);
    }

    /**
     * Return Twitter card metadata html tags
     *
     * @param $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateTwitterCardMetadata($pageItemVariableName = 'twitter_card_metadata', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $twitterCardMetadata */
        $twitterCardMetadata = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($twitterCardMetadata)) return null;

        $return = collect($twitterCardMetadata)
            ->map(function ($value, $key) {
                if (empty($value)) return null;

                switch ($key) {
                    case 'card_type':
                        return "<meta name='twitter:card' content='$value'>" . PHP_EOL;
                    case 'title':
                    case 'description':
                    case 'site':
                    case 'creator':
                    case 'player':
                        return "<meta name='twitter:$key' content='$value'>" . PHP_EOL;
                    case 'image_alt':
                        return "<meta name='twitter:image:alt' content='$value'>" . PHP_EOL;
                    case 'image':
                        $image = self::thumbnail($value);
                        return "<meta name='twitter:image' content='$image'>" . PHP_EOL;
                    case 'app_country':
                        return "<meta name='twitter:app:country' content='$value'>" . PHP_EOL;
                    case 'app_iphone_id':
                        return "<meta name='twitter:app:id:iphone' content='$value'>" . PHP_EOL;
                    case 'app_iphone_url':
                        return "<meta name='twitter:app:url:iphone' content='$value'>" . PHP_EOL;
                    case 'app_ipad_name':
                        return "<meta name='twitter:app:name:ipad' content='$value'>" . PHP_EOL;
                    case 'app_ipad_id':
                        return "<meta name='twitter:app:id:ipad' content='$value'>" . PHP_EOL;
                    case 'app_ipad_url':
                        return "<meta name='twitter:app:url:ipad' content='$value'>" . PHP_EOL;
                    case 'app_google_play_name':
                        return "<meta name='twitter:app:name:googleplay' content='$value'>" . PHP_EOL;
                    case 'app_google_play_id':
                        return "<meta name='twitter:app:id:googleplay' content='$value'>" . PHP_EOL;
                    case 'app_google_play_url':
                        return "<meta name='twitter:app:url:googleplay' content='$value'>" . PHP_EOL;
                    case 'player_width':
                        return "<meta name='twitter:player:width' content='$value'>" . PHP_EOL;
                    case 'player_height':
                        return "<meta name='twitter:player:height' content='$value'>" . PHP_EOL;
                    case 'player_stream':
                        return "<meta name='twitter:player:stream' content='$value'>" . PHP_EOL;
                    case 'player_stream_content_type':
                        return "<meta name='twitter:player:stream:content_type' content='$value'>" . PHP_EOL;
                    default:
                        return null;
                }
            })
            ->filter()
            ->toArray();

        if (empty($return)) return null;

        return join('', $return);
    }

    /**
     * Return a theme-color metadata html tag
     *
     * @param $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateThemeColorMetadata($pageItemVariableName = 'theme_color_metadata', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $themeColorMetadata */
        $themeColorMetadata = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($themeColorMetadata)) return null;

        $color = isset_not_empty($themeColorMetadata->color);

        $return = (!empty($color))
            ? "<meta name='theme-color' content='$color'>" . PHP_EOL
            : '';

        return $return;
    }

    /**
     * Return MS tile metadata html tags
     *
     * @param $pageItemVariableName
     * @param null $templateItemVariableName
     * @param null $globalItemVariableName
     * @return null|string
     */
    public static function generateMSTileMetadata($pageItemVariableName = 'ms_tile_metadata', $templateItemVariableName = null, $globalItemVariableName = null)
    {
        /** @var null|\ArrayObject $msTileMetadata */
        $msTileMetadata = self::getItem($pageItemVariableName, $templateItemVariableName, $globalItemVariableName);

        if (empty($msTileMetadata)) return null;

        $image = isset_not_empty($msTileMetadata->image);
        $color = isset_not_empty($msTileMetadata->color);

        $return = '';

        if (!empty($image)) {
            $image = self::thumbnail($image);
            $return .= "<meta name='msapplication-TileImage' content='$image'>" . PHP_EOL;
        }

        if (!empty($color)) {
            $return .= "<meta name='msapplication-TileColor' content='$color'>" . PHP_EOL;
        }

        return $return;
    }

    /**
     * Return carbon date from string
     *
     * @param $string
     * @param string $format
     * @return null|Carbon
     */
    public static function createDateFromString($string, $format = 'Y-m-d')
    {
        if (empty($string) || empty($format)) return null;

        return Carbon::createFromFormat($format, $string);
    }

    /**
     * Return carbon time from string
     *
     * @param $string
     * @param string $format
     * @return null|Carbon
     */
    public static function createTimeFromString($string, $format = 'H:i:s')
    {
        if (empty($string) || empty($format)) return null;

        if (!!preg_match('/(am|AM|pm|PM|Am|aM|pM|Pm)$/', $string)) {
            $format = 'h:i:s A';
        }

        return Carbon::createFromFormat($format, $string);
    }

    /**
     * Return carbon datetime from string
     *
     * @param $string
     * @param string $format
     * @return null|Carbon
     */
    public static function createDateAndTimeFromString($string, $format = 'Y-m-d H:i:s')
    {
        if (empty($string) || empty($format)) return null;

        if (!!preg_match('/(am|AM|pm|PM|Am|aM|pM|Pm)$/', $string)) {
            $format = 'h:i:s A';
        }

        return Carbon::createFromFormat($format, $string);
    }

    /**
     * Return carbon datetime/time/date from string
     *
     * @param $string
     * @return Carbon|null
     */
    public static function createDateTime($string)
    {
        if (empty($string)) return null;

        if (!!preg_match('/^\d+-\d+-\d+ \d+:\d+:\d+((\s)*(am|AM|pm|PM|aM|Am|pM|Pm))?$/', $string)) {
            return self::createDateAndTimeFromString($string);
        } else if (!!preg_match('/^\d+-\d+-\d+$/', $string)) {
            return self::createDateFromString($string);
        } else if (!!preg_match('/^\d+:\d+:\d+((\s)*(am|AM|pm|PM|aM|Am|pM|Pm))?$/', $string)) {
            return self::createTimeFromString($string);
        } else {
            return null;
        }
    }

    /**
     * Return map coordination object
     *
     * @param $string
     * @param string $separator
     * @return mixed
     */
    public static function getMapCoordination($string, $separator = ',')
    {
        $coordination = json_decode(json_encode([
            'latitude' => null,
            'longitude' => null
        ]), false);

        if (empty($string)) return $coordination;

        $string = preg_replace('/\s+/', '', $string);

        if (preg_match('/^(\d+(\.?\d+)?)' . preg_quote($separator, '/') . '(\d+(\.?\d+)?)$/', $string)) {
            try {
                $array = explode($separator, $string);
                $coordination->latitude = floatval($array[0]);
                $coordination->longitude = floatval($array[1]);
            } catch (\Exception $exception) {
                $coordination = json_decode(json_encode([
                    'latitude' => null,
                    'longitude' => null
                ]), false);
            }
        }

        return $coordination;
    }

    /**
     * Return a converted currency
     *
     * @param $value
     * @param null $from
     * @param string|array $tos
     * @return Money|null|string
     */
    public static function convertCurrency($value, $from = null, $tos)
    {
        $converted = $value;

        if (empty($value)) return $converted;

        if (empty($from)) {
            $from = self::getCurrentBaseCurrency();
        }

        if (!is_array($tos)) {
            $tos = array($tos);
        }

        $value = floatval($value);

        if (!empty($tos)) {
            $converted = array();

            collect($tos)->each(function ($to) use ($value, $from, &$converted) {
                try {
                    $from = strtoupper($from);
                    $to = strtoupper($to);

                    $exchange = (new Exchange);
                    $exchange->base($from);
                    $exchange->symbols($to);

                    $rate = collect($exchange->get())->values()->first();

                    /** @var Money $money */
                    $money = Money::$from($value);
                    $amount = $money->convert(new Currency($to), $rate);
                    $converted[$to] = $amount->getAmount();
                } catch (\Exception $exception) {
                }
            });

            try {
                if (count($converted) === 1) {
                    $converted = collect($converted)->values()->first();
                } else if (count($converted) <= 0) {
                    $converted = null;
                }

                $converted = json_decode(json_encode($converted), false);
            } catch (\Exception $exception) {
            }
        }

        return $converted;
    }

    /**
     * Generate unique cache key for view caching
     *
     * @param string $variableName
     * @return string
     */
    public static function generateCacheKey($variableName = 'variable_name')
    {
        $id = array();

        if ($site = self::getSite()) {
            $id[] = isset_not_empty($site->id, 'site');
        } else {
            $id[] = 'site';
        }

        if ($page = self::getCurrentPage()) {
            $id[] = isset_not_empty($page->id, 'page');
        } else {
            $id[] = 'page';
        }

        if ($mainLanguageCode = self::getCurrentLanguageCode()) {
            $id[] = $mainLanguageCode;
        } else {
            $id[] = 'code';
        }

        $id[] = $variableName;

        if (empty($id)) return 'unknown';

        return join('__', $id);
    }

    /**
     * Return a control-list paginator from item
     *
     * @param $item
     * @param $variableName
     * @return ControlListPaginator
     */
    public static function createControlListPaginatorFromItem($item, $variableName)
    {
        if (is_null($variableName)) return null;

        $paginator = null;

        if (!is_null($item)) {
            if (isset($item->{$variableName . CMSConstants::PAGINATION})) {
                $paginator = $item->{$variableName . CMSConstants::PAGINATION};
            }
        }

        return new ControlListPaginator($paginator);
    }

    /**
     * Return a control-list paginator from JSON string
     *
     * @param $json
     * @return ControlListPaginator|null
     */
    public static function createControlListPaginatorFromJSON($json)
    {
        if (is_null($json)) return null;

        try {
            $json = json_decode($json);
            return new ControlListPaginator($json);
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * @param $array
     * @param $column
     * @param $direction
     */
    public static function sortByColumn(&$array, $column, $direction = SORT_ASC)
    {
        $reference_array = array();
        foreach ($array as $key => $row) {
            $reference_array[$key] = $row->{$column};
        }
        array_multisort($reference_array, $direction, $array);
    }

    /**
     * @param $friendlyUrl
     * @param Request $request
     */
    public static function pageUrl($friendlyUrl = null)
    {
        if(strpos($friendlyUrl, 'http') !==false){
            return $friendlyUrl;
        }else {
            if ($friendlyUrl !== null) {
                $slug = ($friendlyUrl == 'homepage') ? '/' : $friendlyUrl;
                $currentLanguageCode = self::getCurrentLanguageCode();
                if ($mainLanguage = self::getSiteMainLanguage()) {
                    $languageCode = ($currentLanguageCode !== $mainLanguage->code) ? $currentLanguageCode : '';
                }
                return ($languageCode !== '') ? url($languageCode . '/' . $slug) : url($slug);
            } else {
                return null;
            }
        }
        return null;
    }
}