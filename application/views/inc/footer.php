</div><!--container-->
</div><!--row-->
</div><!--main-->


<script>
    $(document).ready(function(){
        $('#msg').hide().slideDown('slow').delay(2000).slideUp("slow");
    });
</script>


<style>
    #msg{
        position: fixed;
        top:0px;
        width:50%;
        z-index: 2000;
        border-radius: 0px 0px 5px 5px !important;
        -moz-border-radius: 0px 0px 5px 5px !important;
        -webkit-border-radius: 0px 0px 5px 5px !important;
    }
</style>
</body>
</html>