<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function indexAction(string|int $id)
    {
        $content = '';
        if ($id == '5' || $id == 'about-us') {
            $content = $this->getAboutusPage();
        } else {
            $path = content_dir("data/pages/{$id}.php");
            if (file_exists($path)) {
                $content = include $path;
            }
        }



        return $content;
    }

    private function getAboutusPage(): string
    {

        $data = include_once content_dir('data/paper_2/about_us_template.php');

        //$data['page']->title = 'This is a new title'; // we are overriding the title for the page

        //$whoWeAreChildren = $data['whoWeAre']->children;

        // we are overriding the content for the first page in section 1
        // $whoWeAreChildren[0]->content = 'We are working hard in wyreema and we are loving it';

        //$data['whoWeAre']->children = $whoWeAreChildren;

        $page->facebook = settings('app.socials.facebook');
        $page->google = settings('app.socials.google');
        $page->twitter = settings('app.socials.twitter');
        $page->github = settings('app.socials.github');
        $page->email = settings('app.socials.email');

        return render_template('about_us', $data)->render();
    }
}
