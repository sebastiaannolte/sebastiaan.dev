<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Artesaos\SEOTools\Facades\SEOMeta;
use Modules\Pages\Entities\Pages;

class PagesController extends Controller
{
    public function about()
    {
        $page = Pages::findOrFail(1);
        SEOMeta::setTitle($page->title);
        //make function to create meta description
        SEOMeta::setDescription(substr(htmlentities(strip_tags(base64_decode($page->content))), 0, 90) . '...');

        return view('pages::index', [
            'page' => $page
        ]);
    }

    public function admin()
    {
        $page = Pages::findOrFail(2);
        SEOMeta::setTitle($page->title);

        return view('pages::admin.index', [
            'page' => $page
        ]);
    }

    public function pages()
    {
        $pages = Pages::orderByDesc("updated_at")->paginate(1);
        SEOMeta::setTitle('Pages');

        return view('pages::admin.pages', [
            'pages' => $pages
        ]);
    }

    public function edit($id)
    {
        $page = Pages::findOrFail($id);
        SEOMeta::setTitle('Edit ' . $page->title);

        return view('pages::admin.edit', [
            'page' => $page
        ]);
    }

    public function update(Request $request, $id)
    {
        $page = Pages::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|unique:pages,title,' . $page->id,
            'content' => 'required',
        ]);
        $page->title = $request->title;
        $page->content = base64_encode($request->content);

        $page->save();

        return redirect('/admin/pages');
    }
}
