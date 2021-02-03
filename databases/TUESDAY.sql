SELECT * FROM USER
            JOIN user_role
            ON user.userid = user_role.userid
            JOIN role_permission
            ON user_role.roleid = role_permission.roleid
            JOIN permission
            ON role_permission.permissionid = permission.permissionid
            WHERE user.username = 'l34'