# readme

## Role 角色
#### 创建
```php
use Spatie\Permission\Models\Role;
$role = Role::create(['name' => 'writer']);
```
#### 给角色分配权限
```php
$role->givePermissionTo('edit articles');
$role->givePermissionTo($role);
```
#### 判断角色是否包含某个权限
```php
$role->hasPermissionTo('edit articles');
```
#### 把权限从角色上移除
```php
$role->revokePermissionTo('edit articles');
```

## Permission 权限
#### 创建
```php
use Spatie\Permission\Models\Permission;
$permission = Permission::create(['name' => 'edit articles']);
```
####

## 用户
#### 给用户分配角色
```php
$user->assignRole('writer');
```
#### 一次分配多个角色
```
$user->assignRole('writer', 'admin');
$user->assignRole(['writer', 'admin']);
```
#### 给用户分配权限
```php
$user->givePermissionTo('delete articles');
```
#### 移除用户的角色
```php
$user->removeRole('writer');
```
#### 判断一个用户是否包含某个角色:
```php
$user->hasRole('writer');
```
#### 判断用户是否包含给定其中的一个角色 or
```php
$user->hasAnyRole(Role::all());
```
#### 判断用户是否多个角色 and
```php
$user->hasAllRoles(Role::all());
```

sudo openssl req -x509 -nodes -days 36500 -newkey rsa:2048 -keyout ./api.yyjobs.key -out ./api.yyjobs.crt