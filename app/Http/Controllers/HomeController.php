<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['maps']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function maps()
     {
        $data['location_indo'] = collect(Http::get('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json')->json());
         return view('maps',$data);
     }

    public function index()
    {
        $data['suspect_indo'] = collect(Http::get('https://api.kawalcorona.com/indonesia')->json());
        $data['location_indo'] = collect(Http::get('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json')->json());
        return view('home',$data);
    }

    public function contact()
    {
        $data['contacts']=Contact::whereNull('kabupaten')->get();
        $data['kabupatens']=Contact::whereNull('provinsi')->get();
        // dd($data);
        return view('contact.contact',$data);
    }

    public function post()
    {
        $data['posts']=Post::all();
        return view('post.post',$data);
    }
    public function addpost()
    {
        return view('post.add');
    }
    public function savepost(Request $request)
    {
        $post=new Post();
        $post->judul=$request->judul;
        $post->post=$request->post;
        $post->kategori=1;
        $post->save();
        return redirect()->route('post');
    }
    
    public function viewpost($id)
    {
        $data['post'] =DB::table('posts')->where('id', $id)->first();
        return view('post.detail',$data);
    }

    public function updatepost(Request $request,$id)
    {
        $post=new Post();
        $post=Post::find($id);
        $post->judul=$request->judul;
        $post->post=$request->post;
        $post->kategori=1;
        $post->save();
        return redirect()->route('post');
    }

    public function kesimpulan ()
    {
        $data['post'] =DB::table('posts')->where('kategori', 2)->first();
        return view('summary.summary',$data);

        
    }

    public function updateanalisa(Request $request)
    {
        $post=new Post();
        $post=Post::where('kategori',2)->first();
        $post->post=$request->post;
        $post->kategori=2;
        $post->save();
        return redirect()->route('kesimpulan');
    }

    public function deletepost($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }

    public function admin()
    {
        $data['admins']=User::all();
        return view('admin.index',$data);
    }

    public function addAdmin()
    {
        return view('admin.add-admin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user =new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('admin');
    } 

    public function saveAdmin($id)
    {
        $data['user']=User::find($id);
        return view('admin.edit',$data);
    }
    public function updateAdmin(Request $request,$id)
    {
        $user=new User();
        $user=User::find($id);
        $user->name=$request->name;
        $user->save();
        return redirect()->route('admin');
    }

    public function deleteAdmin($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }

}
