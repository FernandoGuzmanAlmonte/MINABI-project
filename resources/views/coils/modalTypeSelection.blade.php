<div class="modal fade" id="createProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Seleccione un nuevo elemento a crear</b></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
                <div class="modal-body">
                  @can('ribbon.create')
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Rollo
                    </label>
                  </div>
                  @endcan
                    @can('wasteRibbon.create')
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Merma
                      </label>
                    </div>
                    @endcan
                      @can('coilReel.create')
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="3">
                        <label class="form-check-label" for="flexRadioDefault3">
                          Hueso
                        </label>
                      </div>    
                      @endcan
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" onclick="redirect({{$coil->id}})">Crear</button>  
                </div>
                <script type="text/javascript">
                    function redirect(id){
                        if(document.getElementById('flexRadioDefault1').checked == true){
                           location.replace ("http://bolsasdecelofanminabi.com.mx/ribbon/create/"+id)
                        }
                        if(document.getElementById('flexRadioDefault2').checked == true){
                            location.replace ("http://bolsasdecelofanminabi.com.mx/wasteRibbon/create/"+id)
                        }
                        if(document.getElementById('flexRadioDefault3').checked == true){
                            location.replace ("http://bolsasdecelofanminabi.com.mx/coilReel/create/"+id)
                        }
                    }
                </script>
        </div>
    </div>
</div>
