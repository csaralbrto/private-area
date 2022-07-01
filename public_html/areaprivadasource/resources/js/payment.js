var handler = ePayco.checkout.configure({
    // key: '4bd9d21f5e9bd245d8da52dd8b4c1c02',//produccion 
    key:'78d6907dd50107a5bb838ec75588b8e0',//stage
    test: true
})
var data={
    //Parametros compra (obligatorio)
    name: "compra",
    description: "",
    invoice: "AP-555555",
    currency: "cop",
    amount: "200000",
    tax_base: "0",
    tax: "",
    country: "co",
    lang: "en",

    //Onpage="false" - Standard="true"
    external: "false",


    //Atributos opcionales
    extra1: "extra1",
    extra2: "extra2",
    extra3: "extra3",
    // response: "http://areap.150porciento.com/tokenCart",//stage
    response: "https://areaprivada.co/tokenCart",//produccion
    // response: "http://localhost/area_privada/public/tokenCart",//local



    //Atributos cliente
    name_billing: "Andres Perez",
    address_billing: "Carrera 19 numero 14 91",
    type_doc_billing: "cc",
    mobilephone_billing: "3050000000",
    number_doc_billing: "100000000"
    }

    $('#pay').on('click',function(){
        $.ajax({
            type:'get',
            url:'getData',
        }).done(function(response){
            // data.amount = response.amount
            // data.tax_base=response.tax_base
            // data.tax =response.tax
            data.description = response.items
            data.name_billing = response.user.name
            data.address_billing = response.user.address
            data.mobilephone_billing = response.user.celPhone
            data.number_doc_billing = response.user.number            
            handler.open(data)
            console.log(data)
        })
        $(this).addClass('disabled')
    });