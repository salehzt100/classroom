    $(document).ready(function () {

    CKEDITOR.replace('editor1', {
        language: 'en'
    });
    CKEDITOR.replace('editor2', {
    language: 'en'
});
});
    /*
    tinymce.init({
    selector: '#description',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
{ value: 'First.Name', title: 'First Name' },
{ value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
});
    */

    // Function to copy text from an element
    function copyTextToClipboard(text) {
    const textArea = document.createElement('textarea');
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
}

    document.getElementById('copyCodeBtn').addEventListener('click', function () {
    const text = document.getElementById('classCode').innerText;
    copyTextToClipboard(text);
    alert('Class code copied!');
});

    document.getElementById('copyLinkBtn').addEventListener('click', function () {
    const link = document.getElementById('linkToCopy').value;
    copyTextToClipboard(link);
    alert('Link copied!');
});

