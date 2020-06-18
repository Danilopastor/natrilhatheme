<?php
// Produz um avatar compatível com hCard
function commenter_link() {
    $commenter = get_comment_author_link();
        if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
            $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
        } else {
            $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
        }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link
?>
<?php
// Campos do perfil personalizado
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
function my_show_extra_profile_fields( $user ) { ?>
<h3>Você nas redes sociais</h3>
<table class="form-table">
<tr>
<th><label for="googleuser">Google+</label></th>
<td>
<input type="text" name="googleuser" id="googleuser" value="<?php echo esc_attr( get_the_author_meta( 'googleuser', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description">O seu perfil no Google+ (URL)</span>
</td>
</tr>
<tr>
<th><label for="twitter">Twitter</label></th>
<td>
<input type="text" name="twitteruser" id="twitteruser" value="<?php echo esc_attr( get_the_author_meta( 'twitteruser', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description">O seu nome de usuário do Twitter</span>
</td>
</tr>
<tr>
<th><label for="facebookuser">Facebook</label></th>
<td>
<input type="text" name="facebookuser" id="facebookuser" value="<?php echo esc_attr( get_the_author_meta( 'facebookuser', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description">O seu perfil no Facebook (URL)</span>
</td>
</tr>
</table>
<?php } ?>
<?php
// Guardar e manter as infos nos campos
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );
    function my_save_extra_profile_fields( $user_id ) {
        if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    update_usermeta( $user_id, 'googleuser', $_POST['googleuser'] );
    update_usermeta( $user_id, 'twitteruser', $_POST['twitteruser'] );
    update_usermeta( $user_id, 'facebookuser', $_POST['facebookuser'] );
    }
?>