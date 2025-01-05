v                    $('#editJobTitleModalLabel').text(modalTitle);
                    $('#editRoleName').val(response.role.name);
                    $('#edit-role-form').attr('action', '/roles/' + roleId);

                    $('#editPermissionsBody').empty();
                    Object.keys(response.permissions).forEach(function (permissionId) {
                        const permissionName = response.permissions[permissionId];
                        const isChecked = response.role.permissions.some((p) => p.id == permissionId) ? 'checked' : '';

                        const row = `
                            <tr>
                                <td>${permissionName}</td>
                                @foreach (['Manage', 'Create', 'Edit', 'Delete'] as $action)
                                    <td>
                                        <input type="checkbox" name="permissions[]" value="${permissionId}" ${isChecked} class="form-check-input">
                                    </td>
                                @endforeach
                            </tr>
                        `;
                        $('#editPermissionsBody').append(row);
                    });

                    $('#editJobTitleModal').modal('show');
                }
            },
            error: function (xhr) {
                console.error(xhr.responseJSON.message);
                alert('Failed to fetch role data.');
            },
        });
    });
</script>
@endsection
