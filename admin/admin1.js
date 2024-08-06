function toggle_changes(toggle_label){
    let modified_label = toggle_label.charAt(0).toLowerCase() + toggle_label.slice(1);
    let modified_side='#'+modified_label+'_sidenav';
    $('#sch_sidenav').find('.active').removeClass('active');
    if(modified_label=='teachers' || modified_label=='students'){
        $('#users_sidenav').addClass('active');
        $('#pageSubmenu').show();
    }else{
        $('#pageSubmenu').hide();
    }
    $(modified_side).addClass('active');
    $('.page-header').html(toggle_label);
}

var hash = location.hash.replace(/^#/, '');  
if (hash) {
    $('.nav-tabs a[href="#' + hash + '"]').tab('show');
} 


