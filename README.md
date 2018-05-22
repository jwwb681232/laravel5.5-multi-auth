# readme

## Role 角色
#### 创建
```php
use Spatie\Permission\Models\Role;
$role = Role::create(['name' => 'writer']);
```
####

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
```php
$user->assignRole('writer', 'admin');
$user->assignRole(['writer', 'admin']);
```
#### 移除用户的角色
```php
$user->removeRole('writer');
```
#### 判断一个用户是否包含某个角色:
```php
$user->hasRole('writer');
```
#### 判断用户是否包含给定其中的一个角色
```php
$user->hasAnyRole(Role::all());
```