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
        <td>${tickets[i].fk_course_id}</td>
        <td>${tickets[i].fk_topic_id}</td>
        <td>${tickets[i].fk_student_id}</td>
        <td>${tickets[i].fk_teacher_id}</td> 
        <td>${tickets[i].ticket_status}</td> 
        <td>${x}</td>  
      </tr>
    `)
}