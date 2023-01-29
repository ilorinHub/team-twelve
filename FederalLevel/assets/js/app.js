const processDelete = ( url, data ) => {
    
    $.ajax({
        url: url, 
        method: 'POST', 
        data: { 'delete' : data },
        success: ( res ) => {
            //parsing results
            //alert( res );  
            window.location.replace( url );   
        }
    });

};


const promptUser = ( dt_name ) => {
	return confirm( 'Do you really want to delete this ' + dt_name );
};


$( document ).on( 'click', '.del_btn', ( e ) => { 
    const id = e.currentTarget.getAttribute("data-id");
    const dt_name = e.currentTarget.getAttribute("data-name");
    const url = e.currentTarget.getAttribute("data-url");

    //validating
    if ( id ) 
    {
        if ( promptUser( dt_name ) )
        {
            processDelete( url, id )
        }
    }
    else
    {
        alert('Please select an item');
    }
});
