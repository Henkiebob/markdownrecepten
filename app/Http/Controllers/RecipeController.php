<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recipe;
use App\Image;
use App\Tag;

use Illuminate\Support\Facades\Redirect;
use GrahamCampbell\Markdown\Facades\Markdown;

class RecipeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
          'recipes.index',
          [
            'recipes' => Recipe::all(),
            'tags'  => Tag::all(),
          ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.new', ['tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $description = Markdown::convertToHtml($request->get('description'));
        $recipe = new Recipe;

        $this->validate($request, [
          'title' => 'required',
        ]);

        $recipe->description = $description;
        $recipe->title = $request->get('title');
        $recipe->status = 0;
        $ids = [];
        $tags = $request['tags'];
        if (!empty($tags)) {
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                array_push($ids, $tag->id);
            }
        }

        $recipe->save();
        $recipe->tags()->sync($ids);

        if($request->file('file')) {
            $image = new Image;

            $this->validate($request, [
              'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $input['imagename'] = $request->file('file')->getClientOriginalName();
            $destinationPath = public_path('/images/recipes/');
            $request->file('file')->move($destinationPath, $input['imagename']);

            $image->filename = $input['imagename'];
            $image->recipe_id = $recipe->id;
            $image->save();
        }

        $request->session()->flash('succes', 'Recept opgeslagen');

        return Redirect::to('recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        $recipe->load('tags');
        return $recipe;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('recipes.edit', ['recipe' => Recipe::find($id), 'tags' => Tag::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
