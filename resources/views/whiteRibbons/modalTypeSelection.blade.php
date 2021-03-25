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
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Merma
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2">
                        <label class="form-check-label" for="flexRadioDefault2">
                          Hueso
                        </label>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" onclick="redirect({{$whiteRibbon->id}})">Crear</button>  
                </div>
                <script type="text/javascript">
                    function redirect(id){
                        if(document.getElementById('flexRadioDefault1').checked == true){
                           location.replace ("http://bolsasdecelofanminabi.com.mx/whiteWasteRibbon/create/"+id)
                        }
                        if(document.getElementById('flexRadioDefault2').checked == true){
                            location.replace ("http://bolsasdecelofanminabi.com.mx/whiteRibbonReel/create/"+id)
                        }
                    }
                </script>
        </div>
    </div>
</div>
