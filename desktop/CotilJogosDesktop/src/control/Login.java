/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import model.dao.AdminDAO;
import model.domain.AdminModel;

/**
 *
 * @author lgpc1
 */
public class Login{
    
    public static AdminModel validarInformacoes(String usuario, String senha){
        
        String senhaCr = null;
        int userId = 0;
        
        /*
        *Instanciando classes admin
        */
        AdminDAO adminDAO = new AdminDAO();
        AdminModel admin = new AdminModel();
        
        userId = adminDAO.userExist(usuario);
        if(userId != 0){
            
            admin = adminDAO.selectAdminData(userId);
            
            /*
            *verificar senha
            */
            senhaCr = criptografarSenha(senha);
            
            if(usuario.equals(admin.getUsuario()) && senhaCr.equals(admin.getSenha())){
                adminDAO = null;
                
                return admin;
            }
            
        }
        
        return null;
    }
    
    private static String criptografarSenha(String senha){
        
        String generatedPassword = null;
        
        try {
            // Create MessageDigest instance for MD5
            MessageDigest md = MessageDigest.getInstance("MD5");
            //Add password bytes to digest
            md.update(senha.getBytes());
            //Get the hash's bytes 
            byte[] bytes = md.digest();
            //This bytes[] has bytes in decimal format;
            //Convert it to hexadecimal format
            StringBuilder sb = new StringBuilder();
            for(int i=0; i< bytes.length ;i++)
            {
                sb.append(Integer.toString((bytes[i] & 0xff) + 0x100, 16).substring(1));
            }
            //Get complete hashed password in hex format
            generatedPassword = sb.toString();
        } 
        catch (NoSuchAlgorithmException e) 
        {
            e.printStackTrace();
        }
        return generatedPassword;
    }
}
