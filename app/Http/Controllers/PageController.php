<?php

namespace App\Http\Controllers;

use App\Pages;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function about()
    {
        $page = Pages::findOrFail(1);
        SEOMeta::setTitle($page->title);
        SEOMeta::setDescription(substr(htmlentities(strip_tags(base64_decode($page->content))), 0, 90) . '...');

        return view('pages.about', [
            'page' => $page
        ]);
    }

    public function admin()
    {
        $page = Pages::findOrFail(2);
        SEOMeta::setTitle($page->title);

        return view('admin.pages.admin', [
            'page' => $page
        ]);
    }

    public function pages()
    {
        $pages = Pages::all()->sortByDesc("updated_at");
        SEOMeta::setTitle('Pages');

        return view('admin.page.pages', [
            'pages' => $pages
        ]);
    }

    public function edit($id)
    {
        $page = Pages::findOrFail($id);
        SEOMeta::setTitle('Edit ' . $page->title);

        return view('admin.page.edit', [
            'page' => $page
        ]);
    }

    public function save(Request $request, $id)
    {
        $page = Pages::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|unique:pages,title,' . $page->id,
            'content' => 'required',
        ]);
        $page->title = $request->title;
        $page->content = base64_encode($request->content);

        $page->save();

        return redirect('/pages');
    }
}
