console.log(current_User);

for (let i = 0; i < current_User.length; i++) {
  $('.profile-widget-text:eq(0)').append(`
    <p>${current_User[i].first_name} ${current_User[i].last_name}</p>
  `)
  $('.profile-widget-avatar:eq(0)').html(`
    <img style="width: 100%;border-radius: 50%;" src="../../images/avatars/${current_User[i].img}">
    `).css({
        'background-color': 'transparent'
    })
}

for (let i = 0; i < courses.length; i++) {
    $(`#Courses:eq(${0})`).append(`
    <tr>
        <td>${courses[i].name}</td>
        <td>${courses[i].start_date}</td>
        <td>${courses[i].end_date}</td>
        <!--  <td>${courses[i].description}</td>  -->
      </tr>
    `)
}


for (let i = 0; i < tickets.length; i++) {
    var x = tickets[i].open_date_time;
    var y = tickets[i].close_date_time;
    var solved = Math.abs(x - y);
    $(`#tickets:eq(${0})`).append(`
    <tr>
        <td>${tickets[i].course_name}</td>
        <td>${tickets[i].topic_name}</td>
        <td>${tickets[i].student_name}</td>
        <td>${tickets[i].teacher_name}</td> 
        <td>${tickets[i].ticket_status}</td> 
        <td>${x}</td>  
      </tr>
    `)
}

for (let i = 0; i < users.length; i++) {
    $('#adminUsers').append(`
      <tr>
        <td>${users[i].first_name}</td>
        <td>${users[i].last_name}</td>
        <td>${users[i].email}</td>
      </tr>
    `)
    }

