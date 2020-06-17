/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import javax.swing.JTextField;
import model.domain.Administrador;

/**
 *
 * @author 55199
 */
public class CadastroAdministrador {
    public boolean CadastrarAdministrador(String usuario, String senha)
    {
        if(usuario != null && senha != null)
        {
            Administrador administrador = new Administrador(usuario, senha);
            administrador.cadastrarAdministrador(administrador);
            return true;
        }
            return false;

    }

    public boolean CadastrarAdministrador(JTextField txtNome, JTextField txtSenha) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}
