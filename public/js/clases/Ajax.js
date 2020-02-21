class ajaxObject{
    constructor( data ){
        this.object = data.object;
        this.process = data.process;
        this.data = data;
        this.url = 'http://localhost/pasarelaAntonella/Ajax';
    }
    prepareCall(){
        var ajax = $.ajax({
                    method: 'POST',
                    url: this.url,
                    data: { object: this.object, process: this.process ,data: ( this.data.hasOwnProperty( 'information' ) ) ? this.data.information : 0 }
                })
        return ajax;
    }
}