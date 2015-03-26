//alert{'Hello javascript');
//if {confirm('Question?')); {
//        alert('Ok');
////        } else {
//    alert('Cancel');
//        }
////        
//}

//var loginFormTag = document.getElementById('loginForm');
//alert(loginFormTag.innerHTML);

//console.log('test');
//
//function test() {
//    var form = document.getElementId('loginForm');
//    form.setAttribute('style', 'color: red');
//}
//
//function MyObject(doc) {
//    
//    function ready() {
//    
//    }
//    
//    return this;
//    }
//
//jQuery(document).ready(function() {
//    $('#loginForm')
//});
        jQuery(document).ready(function() {
            //alert();
                    $('#sample').click(function() {
//            var changedText = $('#changedText');
//            
//           // $(this).html('<span>Changed text</span>');
//           $(this).html(changedText);
//            console.log('Click');
//            changedText.show();
//            
//            
//            $('li').each(function(index) {
//                console.log($(this).html());
//                console.log($(this).text());
//            });

//           $.ajax             $.ajax({
//                            url: '/index.php?page=tasks&action=list',
//                            method: 'GET',
//                        }).done(function(response) {
//                            console.log('done');
//                            console.log(response);
//                        }).fail(function(response) {
//                            console.log('fail');
//                            console.log(response);
//                        });

                            $.get('/index.php?page=tasks&action=list' , function(response) {
                                console.log(response);
                            });
                            $('#tasksForm').submit(function(e) {
                                e.preventDefault();
                                
                                var url = $(this).attr('action');
                                var data = $(this).serialize();
                                
                                $.post(url, data).done(function() {
                                    alert('Success');
                                }).fail(function() {
                                    alert('Fail');
                                });
                            });
                            $.ajax({
                                url: 'todo.com/index.php?page=tasks&action=create',
                                method: 'POST',
                                $.post()
                            })
        });
        
        $('#sample').mouseover(function() {
            console.log('Mouseover');
        });
        });