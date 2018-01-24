<?php



namespace App\Http\Controllers;



use App\Post;
use Illuminate\Http\Request;





class SearchController extends Controller

{

    public function index()

    {

        return view('search');

    }



    public function search(Request $request)

    {

        if($request->ajax())

        {

            $output="";

            $products = Post::where('title','LIKE','%'.$request->search."%")->get();

            if($products)

            {

                foreach ($products as $key => $product) {

                    $output.=
                 '<div class="col-sm-6 mb-5">'.
                    '<div class="card">'.
                        '<div class="card-body">'.


                        '<h5 class="card-title"> ' .$product->title . '</h5>'.

                        '<p class="card-text">'  .$product->content. '</p>'.

                        '<a class="btn btn-primary" href="'.'post/'.$product->slug.'"'.'>' .'Read more'. '</a>'.
                         '</div>'.
                '</div>'.
            '</div>';





                }



                return Response($output);



            }



        }



    }

}
