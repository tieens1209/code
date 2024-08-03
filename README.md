## Install package

    npm i
    composer i

## Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

## Generate a new application key

    php artisan key:generate

## Run the database migrations

    php artisan migrate

## Run Project

    npm start

## Run Autoload

composer dump-autoload

## Conventional Commit

-   **feat**: thêm một feature
-   **fix**: fix bug cho hệ thống, vá lỗi trong codebase
-   **refactor**: sửa code nhưng không fix bug cũng không thêm feature hoặc đôi khi bug cũng được fix từ việc refactor.
-   **docs**: thêm/thay đổi document
-   **chore**: những sửa đổi nhỏ nhặt không liên quan tới code
-   **style**: những thay đổi không làm thay đổi ý nghĩa của code như thay đổi css/ui chẳng hạn.
-   **perf**: code cải tiến về mặt hiệu năng xử lý
-   **vendor**: cập nhật version cho các dependencies, packages.


# Thêm tất cả các thay đổi vào staging area
git add .

# Commit các thay đổi với thông báo "hhhh"
git commit -m "hhhh"

# Đẩy các thay đổi lên remote repository
git push

# Chuyển sang nhánh 'dev'
git checkout dev

# Kéo các thay đổi mới nhất từ remote cho nhánh 'dev'
git pull

# Quay lại nhánh trước đó (giả sử đó là 'feature-branch')
git checkout -

# Rebase nhánh hiện tại lên nhánh 'dev'
git rebase dev

# Giải quyết xung đột (nếu có)
# Ví dụ:
# nano conflicted_file.txt
# git add conflicted_file.txt
# git rebase --continue

# Đẩy các thay đổi (sử dụng --force để cập nhật lịch sử commit trên remote)
git push --force
