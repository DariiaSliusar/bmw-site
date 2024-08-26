import './bootstrap';
// import 'bootstrap-icons/icons';

import { ClassicEditor, Essentials, Bold, Italic, Font, Paragraph, Link, Image,
    ImageCaption,
    ImageResize,
    ImageStyle,
    ImageToolbar,
    ImageUpload, Base64UploadAdapter } from 'ckeditor5';

import 'ckeditor5/ckeditor5.css';

ClassicEditor
    .create( document.querySelector( '#short' ), {
        plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
        toolbar: {
            items: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        }
    } )
    .then( /* ... */ )
    .catch( /* ... */ );

ClassicEditor
    .create( document.querySelector( '#content' ), {
        plugins: [ Essentials, Bold, Italic, Font, Paragraph, Link, Image,ImageCaption,
            ImageResize,
            ImageStyle,
            ImageToolbar,
            ImageUpload, Base64UploadAdapter ],
        toolbar: {
            items: [
                'undo', 'redo', '|', 'bold', 'italic', '|', 'link',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'image', 'uploadImage'
            ]
        },
        image: {
            resizeOptions: [
                {
                    name: 'resizeImage:original',
                    label: 'Default image width',
                    value: null,
                },
                {
                    name: 'resizeImage:50',
                    label: '50% page width',
                    value: '50',
                },
                {
                    name: 'resizeImage:75',
                    label: '75% page width',
                    value: '75',
                },
            ],
            toolbar: [
                'imageTextAlternative',
                'toggleImageCaption',
                '|',
                'imageStyle:inline',
                'imageStyle:wrapText',
                'imageStyle:breakText',
                '|',
                'resizeImage',
            ],
        },
    } )
    .then( /* ... */ )
    .catch( /* ... */ );
