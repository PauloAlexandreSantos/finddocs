
<div class="col-md-6">
    <div class="form-group ">
        <label>selecione o Gabarito</label>

        <input value="" type="file" class="form-control" name="vc_gabarito" size="50MB image/*"
            placeholder="pdf" autofocus>
    </div>
</div>

<div class="col-md-6">
     <div class="form-group ">
         <label>Descrição do aquivo</label>
         <textarea type="text" value="" class="form-control" name="vc_descricao_gabarito" placeholder="Descrição do PDF">{{isset($PDF)?$PDF->vc_descricao_pdf:''}}</textarea>
    </div>
</div>
{{-- <div class="col-md-6">
     <div class="form-group ">
         <label>Titulo do arquivo</label>
         <textarea type="text" value="" class="form-control" name="vc_title" placeholder="Titulo do PDF">{{isset($PDF)?$PDF->vc_descricao_pdf:''}}</textarea>
    </div>
</div>

 --}}
