for (let i = 0; i < users.length; i++) {
    $('#adminUsers').append(`
      <tr>
        <td>${users[i].first_name}</td>
        <td>${users[i].last_name}</td>
        <td>${users[i].email}</td>
      </tr>
    `)
    }