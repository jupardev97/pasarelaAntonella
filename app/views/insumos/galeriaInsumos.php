<div class="container text-center my-3">
    <h3>Carousel de Imagenes</h3>
    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
        <div class="carousel-inner w-100" role="listbox">
            <div class="carousel-item row no-gutters active">
                <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/222/fff?text=1"></div>
                <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/444?text=2"></div>
                <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/888?text=3"></div>
                <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/111/fff?text=4"></div>
            </div>
            <div class="carousel-item row no-gutters">
                <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280?text=5"></div>
                <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/555?text=6"></div>
                <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/333/fff?text=7"></div>
                <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/bbb?text=8"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- Galeria Modal Insumo -->
<div class="modal fade" id="ModalGaleriaInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormCreateInsumo" class="forms-sample">
                <div class="modal-header btn-gradient-dark">
                    <h4 class="modal-title" id=""><i class="mdi mdi-animation"> Imagenes del Insumo</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div id="divAddImgInsumo" class="container">
                        <div class="row">
                            <form id="formAddImgInsumo" >
                                <input type="hidden" class="form-control tipoInsumo">
                                <div class="form-group col-12">
                                  <label>Seleccionar Imagen</label>
                                  <input type="file" name="img[]" class="file-upload-default">
                                  <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Nombre Imagen">
                                    <span class="input-group-append">
                                      <button class="file-upload-browse btn btn-gradient-dark" type="button">Examinar</button>
                                    </span>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="carouselInsumo" class="container text-center my-3">
                        <h3>Carousel de Imagenes</h3>
                        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                            <div class="carousel-inner w-100" role="listbox">
                                <div class="carousel-item row no-gutters active">
                                    <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/222/fff?text=1"></div>
                                    <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/444?text=2"></div>
                                    <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/888?text=3"></div>
                                    <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/111/fff?text=4"></div>
                                </div>
                                <div class="carousel-item row no-gutters">
                                    <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280?text=5"></div>
                                    <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/555?text=6"></div>
                                    <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/333/fff?text=7"></div>
                                    <div class="col-3 float-left"><img class="img-fluid" src="http://placehold.it/350x280/bbb?text=8"></div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-sm btn-gradient-danger" data-dismiss="modal"><i class="mdi mdi-close-octagon">Regresar</i></button>
                    <button type="button" class="btn btn-sm btn-gradient-dark btn-fw setFormAddImgInsumo"><i class="mdi mdi-plus">Agregar Imagen</i></button>
                    <button type="submit" class="btn btn-sm btn-gradient-dark btn-fw setCarouselImgInsumo"><i class="mdi mdi-content-save" >Guardar Imagen</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Galeria Modal Insumo -->