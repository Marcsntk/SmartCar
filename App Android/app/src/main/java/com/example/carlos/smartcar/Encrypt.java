package com.example.carlos.smartcar;

import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

/**
 * Created by Sylvermor on 26/01/2017.
 */

public class Encrypt {
    public static String encrypt(String password) throws NoSuchAlgorithmException {

        //Lo que hace este script es, basicamente, recoger un String pasado por parametro,
        //y lo codifica en MD5. Lo devuelve codificado al momento en 32 dígitos.
        MessageDigest m = MessageDigest.getInstance("MD5");
        byte[] data = password.getBytes();
        m.update(data,0,data.length);
        BigInteger i = new BigInteger(1,m.digest());
        return String.format("%1$032X", i);
    }
}
