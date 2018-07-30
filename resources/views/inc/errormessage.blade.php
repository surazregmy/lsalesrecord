@if(count($errors)>0)
    @foreach($errors -> all() as $error)
        <script>
                function alertfun(){
                    alertify.error('<?php echo $error ?>');
                }
         alertfun();
         </script>
     @endforeach
@endif

@if(session('success'))
        $succ = {{session('success')}};
         <script>
                function alertfun(){
                    alertify.success('<?php echo e(session('success')) ?>');
                }
         alertfun();
         </script>
        
@endif

@if(session('error'))
        <script>
                function alertfun(){
                    alertify.error('<?php echo e(session('error')) ?>');
                }
         alertfun();
         </script>
@endif