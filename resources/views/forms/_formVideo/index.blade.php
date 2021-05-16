<div class="col-md-6">
    <div class="form-group ">
        <label>Titulo do video</label>
     
        <input type="text" class="form-control" name="vc_descricao" value="{{isset($video)?$video->vc_descricao:''}}"
            placeholder="Insira um nome ao video" autofocus>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group ">
        <label>Selecione o Video</label>

        <input  type="file" class="form-control" name="vc_video"   size="50MB video/mp4" value="{{isset($video)?$video->vc_video:''}}"
            autofocus>
    </div>
</div>





