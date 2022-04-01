# Q_2_Database
---
## Git 教程  

**详情请参考：[廖雪峰老师的git教程](https://www.liaoxuefeng.com/wiki/896043488029600)**

### Git Group work 使用指南 (详细代码和操作待添加)
1. Setup 
   1. 下载git
   2. config 本机git连接的github账号(optional)
2. 准备group work
   1. Fork master 仓库到自己的github仓库
   2. clone 自己的fork到本机
      1. master -> forked branch -> local
3. 每次work流程
   1. update 自己的branch，将master的更新fetch到自己的仓库中
   2. 将branch pull到local
   3. 在vscode中修改任何冲突（if any）
   4. 写代码，done
   5. 可以再fetch一次，以免有什么新的change，然后commit，并将local code push到自己的branch
   6. 登录github，向master发起pull request
   7. master检查代码merge，手动确认merge
---

## Server setup (Xampp)
1. put all code in /opt/lampp/htdocs/
2. start server 
3. run create.sql & load.sql
   1. source /opt/lampp/htdocs/Task_C/create.sql
   2. source /opt/lampp/htdocs/Task_C/load.sql
4. Start to use/test
---
## Sequential TODO list:
1. ~~Finalize Database~~
   1. ~~Task_A: BCNF form~~
   2. ~~`Task_A.pdf`~~
2. Create basic interactive database (no css)
   1. setup 
      1. ~~`create.sql` (creating relations)~~
      2. ~~`load.sql` if necessary~~
         1. empty table, load department 出错
         2. 添加Product， User数据集，和load
   2. create and code `HTML` files with basic `forms`(表单)
      1. hyperlink between pages 
         1. Navigation bar on every page
      2. ~~workable forms to take user inputs~~
         1. Multy
            1. Search Product Page (Index Page)
            2. Update Product Page for Employee
               1. update dept 1
               2. update dept 2
               3. update dept 3
               4. update dept 4
         4. 露霆
            1. login in
            2. TODO
         5. 冯先生
            1. TODO
            2. 冯先生第一次用github
         6. Manage Product Page for admin (insert, delete)
         7. Manage Employee page (add, update, delete)
   3. create `php` files that get values from form and excute sql queries
      1. Search 
      2. Insert 
      3. Update 
      4. Delete
3. Finalize database 
   1. 美化
      1. css 
      2. 背景
      3. search bar?
      4. side list?
      5. footers?
   2. Extra functions 
      1. log in system 完善
      2. user permissions 
      3. Check update product
   3. bonus?
      1. order bills 



