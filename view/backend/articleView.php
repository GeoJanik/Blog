

<?php ob_start(); ?>

<h1>Bienvenu dans votre espace administrateur</h1>

<h2>Créer un article</h2>

<div class="createArticle">
    <textarea>
    Rédiger votre article ici ...
  </textarea>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
</div>