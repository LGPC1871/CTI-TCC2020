/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import connection.ConnectionFactory;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.domain.UsuarioModel;

/**
 *
 * @author lgpc1
 */
public class UsuarioDAO {
    
    /**
     *
     * @param where
     * @return
     */
    public static ArrayList<UsuarioModel> getUsers(String where){
        ArrayList<UsuarioModel> resultado = null;
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
                try {
            
            stmt = con.prepareStatement(
                    "SELECT * FROM usuario WHERE ra LIKE ?"
                            + "OR email LIKE ?"
                            + "OR nome LIKE ?"
                            + "OR sobrenome LIKE ?"
            );
            stmt.setString(1, "%"+where+"%");
            stmt.setString(2, "%"+where+"%");
            stmt.setString(3, "%"+where+"%");
            stmt.setString(4, "%"+where+"%");
            rs = stmt.executeQuery();
            if(rs.next()){
                resultado = new ArrayList();
                
                do {
                    UsuarioModel usuario = new UsuarioModel();
                    usuario.setId(rs.getInt("id"));
                    usuario.setRa(rs.getInt("ra"));
                    usuario.setEmail(rs.getString("email"));
                    usuario.setNome(rs.getString("nome"));
                    usuario.setSobrenome(rs.getString("sobrenome"));

                    resultado.add(usuario);
                }while(rs.next());
                return resultado;
            }
            
        } catch (SQLException ex) {
            
            Logger.getLogger(AdminDAO.class.getName()).log(Level.SEVERE, null, ex);
            
        }finally{
            
            ConnectionFactory.closeConnection(con, stmt, rs);
            
        }
        return null;
    }
}
