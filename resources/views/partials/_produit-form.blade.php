@csrf
<div class="form-group">
  <label for="">Designation</label>
  <input value="{{ old('designation') ?? $produit->designation}}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
  <!--small id="helpId" class="text-muted">Help text</small-->
  @error('designation')
      <small class="text-danger">{{$message}}</small>
  @enderror
</div>
<div class="form-group">
    <label for="">Prix</label>
    <input value="{{ $produit->prix}}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <!--small id="helpId" class="text-muted">Help text</small-->
    @error('prix')
    <small class="text-danger">{{$message}}</small>
@enderror
  </div>
  <div class="form-group">
    <label for="">Like</label>
    <input value="{{ $produit->like}}" type="text" name="like" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <!--small id="helpId" class="text-muted">Help text</small-->
    @error('like')
    <small class="text-danger">{{$message}}</small>
@enderror
  </div>
  <div class="form-group">
    <label for="">Description</label>
    <input value="{{ $produit->description}}" type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <!--small id="helpId" class="text-muted">Help text</small-->
    @error('description')
    <small class="text-danger">{{$message}}</small>
@enderror
  </div>  <div class="form-group">
    <label for="">Poids</label>
    <input value="{{$produit->poids}}" type="text" name="poids" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <!--small id="helpId" class="text-muted">Help text</small-->
    @error('poids')
    <small class="text-danger">{{$message}}</small>
@enderror
  </div> 
<div class="form-group">
  <label for="">Pays Source</label>
  <input value="{{$produit->pays_source}}" type="text" name="pays_source" id="" class="form-control" placeholder="" aria-describedby="helpId">
  <!--small id="helpId" class="text-muted">Help text</small-->
  @error('pays_source')
  <small class="text-danger">{{$message}}</small>
@enderror
</div>  
<div class="custom-file mb-5 mt-4">
    <input type="file" name="image" id="image" class="custom-file-input">
    <label class="custom-file-label" for="image">Image</label>
    @error('image')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div> 
<button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
  </div> 
{{--<button type="submit" class="btn btn-success btn-block btn-lg">{{$btnText}}</button>--}}
   {{--
<div class="form-group">
  <label for="">Pays Source</label>
  <select class="form-control" name="pays_source" id="">
    <option value="">Select</option>
    <option value="BF" {{old('pays_source')=='BF'? 'selected':''}}>BF</option>
    <option value="SN" {{old('pays_source')=='SN'? 'selected':''}}>SN</option>
    <option value="GM" {{old('pays_source')=='GM'? 'selected':''}}>GM</option>
  </select>
  @error('pays_source')
  <small class="text-danger">{{$message}}</small>
@enderror
</div>
   --}}