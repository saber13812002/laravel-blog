<?php

namespace App\Http\Requests\Admin;

use App\Models\Post;
use App\Rules\CanBeAuthor;
use Carbon\Carbon;
use http\Client\Request;
use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug($this->input('title'))
        ]);

        $this->merge([
            'posted_at' => Carbon::parse($this->input('posted_at'))
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'posted_at' => 'required|date',
            'thumbnail_id' => 'nullable|exists:media,id',
            'author_id' => ['required', 'exists:users,id', new CanBeAuthor],
            'slug' => 'unique:posts,slug,' . (optional($this->post)->id ?: 'NULL'),
        ];
    }

    public function slug($string, $separator = '-') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }
    public function store(Request $request)
    {
        $this->validate((array)$request, array(
            'title'         => 'required|max:255',
            'slug'          => 'required|min:3|max:255|unique:posts',
            'body'          => 'required',
        ));
        $post = new Post;
        $post->title = $request->input('title');
        $post->slug = $this->slug($request->slug);
        $post->body = $request->input('body');
        $post->save();

        return redirect('admin/posts')->with('success', 'post is successfully saved');
    }

}
