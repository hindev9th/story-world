<?php
declare(strict_types=1);
namespace Modules\Story\src\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller{

    /**
     * Display list stories
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $stories = Story::withCount('episodes')->get();
        return view('Story::adminhtml.index',compact('stories'));
    }

    /**
     * Display view create new story
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $tags = Tag::all();
        return view('Story::adminhtml.create',compact('tags'));
    }

    /**
     * Handle create new story
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validateStory($request);

        $data = $request->all();

        $data['image'] = $request->file('image')->store('/uploads/previews','public');
        $story = Story::create([
            'name' => $data['name'],
            'author' => $data['author'],
            'highlights' => $data['highlights'],
            'status' => $data['status'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);

        $story->tags()->attach($data['tags']);

        return redirect(route('admin.story.index'))->with('message','Created "'.$story->name.'" success!');
    }

    /**
     * Display view edit a story
     *
     * @param Story $story
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Story $story)
    {
        $tags = Tag::all();
        $tagIds = $story->tags->pluck('id')->toArray();
        return view('Story::adminhtml.edit',compact('tags','story','tagIds'));
    }

    /**
     * Handle update a story
     *
     * @param Request $request
     * @param Story $story
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Story $story)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $data = [
            'name' => $request['name'],
            'author' => $request['author'],
            'highlights' => $request['highlights'] ?? 0,
            'status' => $request['status'],
            'description' => $request['description'],
        ];

        if ($request->file('image')){
            $data['image'] = $this->saveAndRemoveImage($story->image,$request->file('image'));
        }
        $story->update($data);

        $tagIds = $story->tags->pluck('id')->toArray();
        if ($tagIds !== $request['tags']){
            $story->tags()->detach();
        }
        $story->tags()->attach($request['tags']);

        return redirect(route('admin.story.index'))->with('message','Updated a story success!');
    }

    /**
     * Delete a story
     *
     * @param Story $story
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect(route('admin.story.index'))->with('message','Deleted "'.$story->name.'" success!');
    }

    /**
     * Validate story
     *
     * @param $request
     * @return mixed
     */
    protected function validateStory($request)
    {
        return $request->validate([
            'name' => ['required','unique:stories'],
            'image' => ['required'],
        ]);
    }

    /**
     * Save and remove image existed
     *
     * @param $oldImage
     * @param $newImage
     * @return mixed
     */
    protected function saveAndRemoveImage($oldImage,$newImage){
        if (Storage::disk('public')->exists($oldImage)){
            Storage::disk('public')->delete($oldImage);
        }
        return $newImage->store('/uploads/previews','public');
    }
}
