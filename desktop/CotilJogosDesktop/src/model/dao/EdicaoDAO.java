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
import model.domain.Edicao;
import model.domain.StatusModalidadeEdicao;


/**
 *
 * @author 55199
 */
public class EdicaoDAO {
    
        public java.util.List<Edicao> read() {
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        
        java.util.List<Edicao> ed = new ArrayList<>();
        
        try {
            stmt = con.prepareStatement("SELECT * FROM edicao");
            rs = stmt.executeQuery();
            
            while(rs.next()){
                
                Edicao e = new Edicao();
                e.setId(rs.getInt("id"));
                e.setTitulo(rs.getString("titulo"));
                e.setAno(rs.getInt("ano"));
                ed.add(e);
                
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(EdicaoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }finally{
            ConnectionFactory.closeConnection(con, stmt, rs);
        }
        
        return ed;
    }
}
