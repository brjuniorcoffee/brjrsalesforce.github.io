const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if (flashData) {
    Swal.fire({
        title: 'Profile ',
        text: 'Profile Success ' + flashData,
        icon: 'success'
    });
}

const menubaru = $('.newmenu'). data('flashdata');
console.log(menubaru);

if (menubaru) {
    Swal.fire({
        title: 'Menu ',
        text:   'New Menu ' + menubaru,
        icon: 'success'
    });
    
}

const rolemsg = $('.rolemessage'). data('flashdata');
console.log(rolemsg);

if (rolemsg) {
    Swal.fire({
        title: 'Success ',
        text:   'Role Successfully ' + rolemsg,
        icon: 'success'
    });
    
}

const newrole = $('.rolemessage'). data('flashdata');
console.log(newrole);

if (newrole) {
    Swal.fire({
        title: 'Success ',
        text:   'New Role ' + newrole,
        icon: 'success'
    });
    
}

const deleted = $('.rolemessage'). data('flashdata');
console.log(deleted);

if (deleted) {
    Swal.fire({
        title: 'Success ',
        text:   'Role Deleted ' + deleted,
        icon: 'success'
    });
    
}


$('.deleted-button').on('click', function (e)
{
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })

});

// $('.deleted-button').on('click', function (e)
// {
//     e.preventDefault();
//     const href = $(this).attr('href');

//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#77F978',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//       }).then((result) => {
//         if (result.isConfirmed) {
//           document.location.href = href;
//         }
//       })

// });


