<?php
declare(strict_types=1);
namespace Modules\Tag\src\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller{

    /**
     * Display list tags
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tags = Tag::all();
        return view('Tag::adminhtml.index',compact('tags'));
    }

    public function create()
    {
        return view('Tag::adminhtml.create');
    }

    /**
     * Handle create new tag
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:tags'],
        ]);
        Tag::create($request->all());
        return redirect(route('admin.tag.index'))->with('message','Created new tag success!');
    }

    /**
     * Edit a tag by name
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Tag $tag)
    {
        return view('Tag::adminhtml.edit', compact('tag'));
    }

    /**
     * Handle update tag
     *
     * @param Request $request
     * @param Tag $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Tag $tag)
    {
        $oldName = $tag->name;
        $request->validate([
            'name' => ['required','unique:tags'],
        ]);

        $tag->update($request->all());
        return redirect(route('admin.tag.index'))->with('message','Edited '.$oldName.' to '.$tag->name);
    }

    /**
     * Delete a tag by name
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect(route('admin.tag.index'))->with('message','Delete '.$tag->name.' success!');
    }
}
