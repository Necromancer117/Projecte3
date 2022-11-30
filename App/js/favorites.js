import $ from 'jquery';

export default function favorites() {}

$('.favorite').on('click',function(event){
    event.preventDefault();

    
    console.log(this.id);
})