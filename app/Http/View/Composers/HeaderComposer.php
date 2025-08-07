<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Course;
use App\Model\Admin\Gallery;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Room;
use App\Model\Admin\Service;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $categories = Category::query()->orderBy('sort_order')->get();
        $postCategories = PostCategory::query()->where('type', 1)->orderBy('sort_order')->get();

        $view->with(['config' => $config,
            'categories' => $categories,
            'postCategories' => $postCategories,
        ]);
    }
}
