
<div class="col-md-4">
    <div class="form-group ">
        <label for="inicio">Hora de início</label>
        <input type="time" class="form-control border-secondary " placeholder="Hora de início" name="inicio"
        value="{{ isset($horas->vc_hora_inicio) ? $horas->vc_hora_inicio : '' }}">
       
       
    </div>
</div>

<div class="col-md-4">
    <div class="form-group ">
        <label for="fim">Hora de fim</label>
        <input type="time" class="form-control border-secondary " placeholder="Hora de fim" name="fim"
        value="{{ isset($horas->vc_hora_fim) ? $horas->vc_hora_fim : '' }}">
       
       
    </div>
</div>