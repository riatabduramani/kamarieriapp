<div class="list-group">
        <a href="/client/menu" class="list-group-item {{{ (Request::is('client/menu') ? 'active' : '') }}}">
          <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Menu
        </a>
        <a href="/client/products" class="list-group-item {{{ (Request::is('client/products*') ? 'active' : '') }}}"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Products</a>
        <a href="/client/ingredients" class="list-group-item {{{ (Request::is('client/ingredients*') ? 'active' : '') }}}"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Ingredients</a>
</div>
