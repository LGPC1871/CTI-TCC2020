/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;
import java.text.ParseException;
import static jdk.nashorn.tools.ShellFunctions.input;
import model.domain.UsuarioModel;
import model.dao.UsuarioDAO;
/**
 *
 * @author 55199
 */

public class Usuario {
    public boolean cadastrarUsuario(String ra, String email, String nome, String sobrenome)
    {
        if(ra != null && email != null && nome != null && sobrenome != null)
        {
            UsuarioModel usuarioModel = new UsuarioModel(ra, email, nome, sobrenome);
            return UsuarioDAO.save(usuarioModel);
        }
        return false;
    }
    
}
