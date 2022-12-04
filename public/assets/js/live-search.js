$(document).mouseup(function(event){
    var div = $('.header-search-bar');
    if(!div.is(event.target) && div.has(event.target).length === 0){
        $('.live-search-results').hide();
    }else{
        $('.live-search-results').show();
    }
});
$(document).ready(function(){
    $('#live-search-input').on('keyup',function(){
        $('.live-search-results').show();
        var key_search = $(this).val();
        console.log(key_search);
        if(key_search != null){
            $.ajax({
                url: 'getLiveSearch/'+key_search,
                method: 'GET',
                success: function(response){
                    $('#add-item-liveSearch').html(response);
                }
            })    
        }else{
            $('.live-search-results').hide();
        }
        
    })
})