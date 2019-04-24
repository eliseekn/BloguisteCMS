    <h5>Paramètres</h5>
</div>

<div class="w3-container" style="width:40%; margin-left:30%">
    <div class="w3-content w3-center menu_bar w3-card w3-padding-16 w3-margin">
        <form id="settings_form">
            <div class="w3-bar w3-blue-grey" style="border-radius: 12px;">
                <a class="w3-bar-item w3-button" id="blog_button">Blog</a>
                <a class="w3-bar-item w3-button" id="admin_button">Administration</a>
            </div>

            <div id="blog" class="config w3-container w3-section">
                <label>Titre du blog</label>
                <input class="w3-input w3-border w3-section" type="text" name="web_title" id="web_title" maxlength="255" autofocus="autofocus" required="required" value="<?=WEB_TITLE?>">
                <label>Nom du dossier racine</label>
                <input class="w3-input w3-border w3-section" type="text" name="web_root" id="web_root" maxlength="255" required="required" value="<?=WEB_ROOT?>">
                <label>Description du blog</label>
                <textarea class="w3-input w3-border w3-section" name="web_description" id="web_description" maxlength="255" required="required" cols="6" rows="4"><?=WEB_DESCRIPTION?></textarea>
            </div>

            <div id="admin" class="config w3-container w3-section" style="display:none">
                <label>Nom d'utilisateur</label>
                <input class="w3-input w3-border w3-section" type="text" name="admin_username" id="admin_username" maxlength="255" autofocus="autofocus" required="required" value="<?=ADMIN_USERNAME?>">
                <label>Mot de passe</label>
                <input class="w3-input w3-border w3-section" type="password" name="admin_password" id="admin_password" maxlength="255" required="required" value="<?=ADMIN_PASSWORD?>">
                <label>Confirmer le mot de passe</label>
                <input class="w3-input w3-border w3-section" type="password" name="admin_password_true" id="admin_password_true" maxlength="255" required="required" value="<?=ADMIN_PASSWORD?>">
                <label>Adresse e-mail</label>
                <input class="w3-input w3-border w3-section" type="email" name="admin_email" id="admin_email" maxlength="255" required="required" value="<?=ADMIN_EMAIL?>">
            </div>

            <input type="submit" class="w3-button w3-section w3-center" id="save_button" value="Sauvegarder les changements">
        </form>
    </div>
</div>
