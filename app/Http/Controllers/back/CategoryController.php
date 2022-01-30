<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Domains;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crumbs=[
            'Kateqoriya'=>route('admin.category')
        ];
        $title='Kateqoriya listi';
        $categorys=Category::with('parentWithDefault','categoryDomain','child')->orderBy('name')->get();

        return view('back.category.index',compact('crumbs','title','categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crumbs=[
            'Kateqoriya'=>route('admin.category'),
            'Yeni'=>route('admin.category.create')
        ];
        $title='Yeni Kateqoriya';

        $cateqories=Category::where('parent_id',0)->get();

        $domains=Domains::all();
        return view('back.category.create',compact('crumbs','title','cateqories','domains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'checkType'=>'required'
        ]);

        $data=[];
        $data['name']=$request->name;
        $data['slug']=Str::slug($request->name);
        $data['photo']='placeholder.jpg';
        if($request->has('parent_id'))
        {
            $data['parent_id']=$request->parent_id;
            $data['domain']=Category::find($request->parent_id)->domain;
        }

        if($request->has('domain'))
        {
            $data['domain']=$request->domain;
        }

        if(request()->hasFile('photo')) {
            $this->validate(request(),[
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $photo=request()->file('photo');


            $file_name=$photo->getClientOriginalName().'_'.time().'.'.$photo->extension();

            if($photo->isValid()) {
                $photo->move('uploads/catalog',$file_name);

                $data['photo']=$file_name;
            }
        }

        Category::create($data);

        return redirect()
            ->route('admin.category.create')
            ->with('type','success')
            ->with('mesaj','Yeni kateqoriya əlavə edildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct($slug)
    {
        $categoryProducts=Category::where('slug',$slug)->with('product.productDomain','product.status')->first();

        $crumbs=[
            'Kateqoriya'=>route('admin.category'),
            $categoryProducts->name=>route('admin.category.create')
        ];
        $title=$categoryProducts->name;

        return view('back.category.product',compact('categoryProducts','crumbs','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category=Category::whereSlug($slug)->firstOrFail();

        $crumbs=[
            'Kateqoriya'=>route('admin.category'),
            $category->name=>route('admin.category.edit',$slug)
        ];
        $title='Kateqoriyanın yenilənməsi';

        $domains=Domains::all();
        $cateqories=Category::where('parent_id',0)->with('child')->get();

        return view('back.category.edit',compact('crumbs','title','domains','category','cateqories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'name'=>'required',
            'checkType'=>'required'
        ]);
        $category=Category::where('slug',$slug)->first();
        $data=[];
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        if($request->has('parent_id'))
        {
            $category->parent_id=$request->parent_id;
            $category->domain=Category::find($request->parent_id)->domain;
        }

        if($request->has('domain'))
        {
            $category->domain=$request->domain;
        }

        if(request()->hasFile('photo')) {
            $this->validate(request(),[
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $photo=request()->file('photo');


            $file_name=$photo->getClientOriginalName().'_'.time().'.'.$photo->extension();

            if($photo->isValid()) {
                $photo->move('uploads/catalog',$file_name);

                $last_image_path = public_path("/uploads/catalog/$category->photo");
                if(File::exists($last_image_path)) {
                    File::delete($last_image_path);
                }
               // @unlink($last_image_path);

                $category->photo=$file_name;
            }
        } else {
            $category->photo='placeholder.jpg';
        }

        $category->save();

        return redirect()
            ->route('admin.category.edit',$category->slug)
            ->with('type','success')
            ->with('mesaj','Dəyişikliklər yerinə yetirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category=Category::where('slug',$slug)->first();
        if($category->photo!='placeholder.jpg') {
            $last_image_path = public_path("/uploads/catalog/$category->photo"); // Value is not URL but directory file path
            if(File::exists($last_image_path)) {
                File::delete($last_image_path);
            }
        }

        $category->delete();
        return redirect()
            ->route('admin.category')
            ->with('type','success')
            ->with('mesaj','Silinmə tamamlandı');
    }
}
