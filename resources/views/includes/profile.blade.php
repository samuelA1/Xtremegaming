<h1 style="margin-bottom: 55px;" class="text-center mb-5">{{Auth::user()->name}}</h1>
<div class="col-md-6 ">
    <div style="margin-bottom: 30px; margin-left: 150px;">
        <img width="50%" class="img-responsive" src="{{asset('/images/'.(Auth::user()->image))}}" alt="">
    </div>
</div>
<div class="col-md-6">
    <form>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                {{Auth::user()->name}}
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                {{Auth::user()->email}}
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Account ID</label>
            <div class="col-sm-10">
                {{Auth::user()->id}}
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Join Date:</label>
            <div class="col-sm-10">
                {{Auth::user()->created_at}}
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">lastly updated:</label>
            <div class="col-sm-10">
                {{Auth::user()->updated_at}}
            </div>
        </div>

    </form>

</div>
