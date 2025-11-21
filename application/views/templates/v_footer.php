</div>

<footer class="footer bg-dark text-white py-3 mt-4">
  <div class="container text-center">
    <span>&copy; <?php echo date('Y'); ?> Konsultasi Hukum. All rights reserved.</span>
  </div>
</footer>

<!-- JQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.6.0/mammoth.browser.min.js"></script>

<!-- Monaco Editor Loader -->
<script>
  var require = {
    paths: {
      vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs'
    }
  };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs/loader.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.30.1/min/vs/editor/editor.main.nls.js"></script>

<!-- Category and Subcategory Management Scripts -->
<script>
  $(document).ready(function() {
    // Base URL for AJAX calls
    const baseUrl = '<?php echo site_url(); ?>';

    // Icon Preview
    $('#categoryIcon').on('input', function() {
      $('#iconPreview').attr('class', $(this).val());
    });

    // Add Category Button
    $('#addCategoryBtn').click(function() {
      $('#modalCategoryTitle').text('Tambah Kategori Baru');
      $('#action').val('add_category');
      $('#categoryId').val('');
      $('#categoryName').val('');
      $('#categoryIcon').val('');
      $('#sortOrder').val(0);
      $('#iconPreview').attr('class', '');
      $('#categoryModal').modal('show');
    });

    // Edit Category Button
    $(document).on('click', '.edit-category', function() {
      const categoryId = $(this).data('id');
      $('#modalCategoryTitle').text('Edit Kategori');
      $('#action').val('edit_category');
      $('#categoryId').val(categoryId);

      // Get category data
      $.ajax({
        url: baseUrl + 'legal_docs/ajax_categories',
        type: 'POST',
        dataType: 'json',
        data: {
          action: 'get_category',
          id: categoryId
        },
        success: function(response) {
          if (response.status === 'success') {
            $('#categoryName').val(response.data.name);
            $('#categoryIcon').val(response.data.icon);
            $('#sortOrder').val(response.data.sort_order);
            $('#iconPreview').attr('class', response.data.icon);
            $('#categoryModal').modal('show');
          } else {
            alert('Error: ' + response.message);
          }
        },
        error: function() {
          alert('An error occurred while fetching category data.');
        }
      });
    });

    // Delete Category Button
    $(document).on('click', '.delete-category', function() {
      if (confirm('Anda yakin ingin menghapus kategori ini dan semua subkategori di dalamnya?')) {
        const categoryId = $(this).data('id');

        $.ajax({
          url: baseUrl + 'legal_docs/ajax_categories',
          type: 'POST',
          dataType: 'json',
          data: {
            action: 'delete_category',
            id: categoryId
          },
          success: function(response) {
            if (response.status === 'success') {
              window.location.reload();
            } else {
              alert('Error: ' + response.message);
            }
          },
          error: function() {
            alert('An error occurred while deleting the category.');
          }
        });
      }
    });

    // Add Subcategory Button
    $(document).on('click', '.add-subcategory', function() {
      const categoryId = $(this).data('category-id');
      $('#modalSubcategoryTitle').text('Tambah Subkategori Baru');
      $('#subcategoryAction').val('add_subcategory');
      $('#subcategoryId').val('');
      $('#parentCategoryId').val(categoryId);
      $('#subcategoryName').val('');
      $('#subcategorySortOrder').val(0);
      $('#subcategoryModal').modal('show');
    });

    // Edit Subcategory Button
    $(document).on('click', '.edit-subcategory', function() {
      const subcategoryId = $(this).data('id');
      $('#modalSubcategoryTitle').text('Edit Subkategori');
      $('#subcategoryAction').val('edit_subcategory');
      $('#subcategoryId').val(subcategoryId);

      // Get subcategory data
      $.ajax({
        url: baseUrl + 'legal_docs/ajax_categories',
        type: 'POST',
        dataType: 'json',
        data: {
          action: 'get_subcategory',
          id: subcategoryId
        },
        success: function(response) {
          if (response.status === 'success') {
            $('#parentCategoryId').val(response.data.category_id);
            $('#subcategoryName').val(response.data.name);
            $('#subcategorySortOrder').val(response.data.sort_order);
            $('#subcategoryModal').modal('show');
          } else {
            alert('Error: ' + response.message);
          }
        },
        error: function() {
          alert('An error occurred while fetching subcategory data.');
        }
      });
    });

    // Delete Subcategory Button
    $(document).on('click', '.delete-subcategory', function() {
      if (confirm('Anda yakin ingin menghapus subkategori ini dan semua dokumen di dalamnya?')) {
        const subcategoryId = $(this).data('id');

        $.ajax({
          url: baseUrl + 'legal_docs/ajax_categories',
          type: 'POST',
          dataType: 'json',
          data: {
            action: 'delete_subcategory',
            id: subcategoryId
          },
          success: function(response) {
            if (response.status === 'success') {
              window.location.reload();
            } else {
              alert('Error: ' + response.message);
            }
          },
          error: function() {
            alert('An error occurred while deleting the subcategory.');
          }
        });
      }
    });

    // Form Submissions
    $('#categoryForm').submit(function(e) {
      e.preventDefault();

      $.ajax({
        url: baseUrl + 'legal_docs/ajax_categories',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response) {
          if (response.status === 'success') {
            $('#categoryModal').modal('hide');
            window.location.reload();
          } else {
            alert('Error: ' + response.message);
          }
        },
        error: function() {
          alert('An error occurred while saving the category.');
        }
      });
    });

    $('#subcategoryForm').submit(function(e) {
      e.preventDefault();

      $.ajax({
        url: baseUrl + 'legal_docs/ajax_categories',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response) {
          if (response.status === 'success') {
            $('#subcategoryModal').modal('hide');
            window.location.reload();
          } else {
            alert('Error: ' + response.message);
          }
        },
        error: function() {
          alert('An error occurred while saving the subcategory.');
        }
      });
    });
  });
</script>

</body>

</html>